#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <gtk/gtk.h>
#include <json-glib/json-glib.h>
#include <curl/curl.h>

typedef struct {
    char *ptr;
    size_t len;
} string;

typedef struct {
    CURL *curl;
    CURLcode res;
    string s;
} curl_struct_type;

typedef struct {
    GtkWidget *window;
    GtkWidget *list;
    GtkListStore *store;
    GtkWidget *url_entry;
    GtkWidget *token_entry;
} gtk_windows;

void init_string(string *s) {
    s->len = 0;
    s->ptr = malloc(s->len+1);
    if (s->ptr == NULL) {
        fprintf(stderr, "malloc() failed\n");
        exit(EXIT_FAILURE);
    }
    s->ptr[0] = '\0';
}

size_t writefunc(void *ptr, size_t size, size_t nmemb, string *s) {
    size_t new_len = s->len + size*nmemb;
    s->ptr = realloc(s->ptr, new_len+1);
    if (s->ptr == NULL) {
        fprintf(stderr, "realloc() failed\n");
        exit(EXIT_FAILURE);
    }
    memcpy(s->ptr+s->len, ptr, size*nmemb);
    s->ptr[new_len] = '\0';
    s->len = new_len;

    return size*nmemb;
}

// ... (d'autres parties du code)

void make_query(gtk_windows *window) {
    const gchar *url = gtk_entry_get_text(GTK_ENTRY(window->url_entry));
    const gchar *token = gtk_entry_get_text(GTK_ENTRY(window->token_entry));
    
    char request_url[1024];
    
    if (strcmp(token, "") != 0) {
        snprintf(request_url, sizeof(request_url), "%s?token=%s", url, token);
    } else {
        snprintf(request_url, sizeof(request_url), "%s", url);
    }
    
    curl_struct_type curl_struct;
    CURL *curl = curl_easy_init();
    if (curl) {
        init_string(&(curl_struct.s));

        curl_easy_setopt(curl, CURLOPT_URL, request_url);
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writefunc);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, &(curl_struct.s));
        
        curl_struct.res = curl_easy_perform(curl);
        
        if (curl_struct.res != CURLE_OK) {
            fprintf(stderr, "curl_easy_perform() failed: %s\n", curl_easy_strerror(curl_struct.res));
        }
        
        curl_easy_cleanup(curl);
        
        JsonParser *parser = json_parser_new();

        // printf("%s\n", curl_struct.s.ptr);
        GError *error = NULL;
        if (json_parser_load_from_data(parser, curl_struct.s.ptr, -1, &error)) {
            JsonNode *root = json_parser_get_root(parser);
            if (root != NULL && json_node_get_node_type(root) == JSON_NODE_ARRAY) {
                JsonArray *array = json_node_get_array(root);
                guint length = json_array_get_length(array);

                gtk_list_store_clear(window->store);
                
                for (guint i = 0; i < length; i++) {
                    JsonObject *object = json_array_get_object_element(array, i);
                    GList *members = json_object_get_members(object);

                    for (GList *m = members; m != NULL; m = m->next) {
                        gchar *key = (gchar*) m->data;
                        const gchar *value = json_object_get_string_member(object, key);

                        GtkTreeIter iter;
                        gtk_list_store_append(window->store, &iter);
                        gtk_list_store_set(window->store, &iter, 0, key, 1, value, -1);
                    }

                    g_list_free(members);
                }
            } else {
                g_print("Erreur d'analyse JSON : %s\n", error->message);
                g_error_free(error);
            }
        }
        
        free(curl_struct.s.ptr);
    }
}

void on_submit_clicked(GtkButton *button, gtk_windows *window) {
    make_query(window);
}
void init_list(gtk_windows *window) {
    // Creating a model
    window->store = gtk_list_store_new(2, G_TYPE_STRING, G_TYPE_STRING);
    
    // Creating a list
    window->list = gtk_tree_view_new_with_model(GTK_TREE_MODEL(window->store));
    
    // Creating two columns
    GtkCellRenderer *renderer = gtk_cell_renderer_text_new();
    GtkTreeViewColumn *column = gtk_tree_view_column_new_with_attributes("Key", renderer, "text", 0, NULL);
    gtk_tree_view_append_column(GTK_TREE_VIEW(window->list), column);
    column = gtk_tree_view_column_new_with_attributes("Value", renderer, "text", 1, NULL);
    gtk_tree_view_append_column(GTK_TREE_VIEW(window->list), column);
}

static void activate(GtkApplication* app, gpointer user_data) {
    gtk_windows *window = (gtk_windows *)user_data;
    
    // Init window
    window->window = gtk_application_window_new(app);
    gtk_window_set_title(GTK_WINDOW(window->window), "Recette Viewer");
    gtk_window_set_default_size(GTK_WINDOW(window->window), 800, 800);

    GtkWidget *box = gtk_box_new(GTK_ORIENTATION_VERTICAL, 10);
    gtk_container_add(GTK_CONTAINER(window->window), box);

    window->url_entry = gtk_entry_new();
    gtk_entry_set_placeholder_text(GTK_ENTRY(window->url_entry), "Entrez l'URL de l'API ici ...");
    gtk_box_pack_start(GTK_BOX(box), window->url_entry, FALSE, FALSE, 0);

    window->token_entry = gtk_entry_new();
    gtk_entry_set_placeholder_text(GTK_ENTRY(window->token_entry), "Entrez le token de l'API ici si besoin");
    gtk_box_pack_start(GTK_BOX(box), window->token_entry, FALSE, FALSE, 0);

    GtkWidget *submit_button = gtk_button_new_with_label("Soumettre");
    g_signal_connect(submit_button, "clicked", G_CALLBACK(on_submit_clicked), window);
    gtk_box_pack_start(GTK_BOX(box), submit_button, FALSE, FALSE, 0);

    // Initializing the list and packing it into the box
    init_list(window);
    gtk_box_pack_start(GTK_BOX(box), window->list, TRUE, TRUE, 0);

    gtk_widget_show_all(window->window);
}


int main(int argc, char **argv) {
    GtkApplication *app;
    int status;

    gtk_windows window;
    
    app = gtk_application_new("org.gtk.recetteviewer", G_APPLICATION_FLAGS_NONE);
    g_signal_connect(app, "activate", G_CALLBACK(activate), &window);
    status = g_application_run(G_APPLICATION(app), argc, argv);
    g_object_unref(app);

    return status;
}
