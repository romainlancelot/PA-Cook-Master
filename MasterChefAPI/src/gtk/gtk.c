#include <gtk/gtk.h>
#include <libnotify/notify.h>
#include "curl.h"
#include "gtk.h"
#include "my.h"
#include "database.h"

// Déclaration des pointeurs pour les builder et widgets
GtkBuilder *builder;
GtkWidget *make_query;
GtkWidget *config_database;

static void on_submit_make_query_form(GtkButton *button, gpointer user_data)
{
    GtkWidget *url_entry = GTK_WIDGET(gtk_builder_get_object(builder, "url_entry"));
    GtkComboBoxText *method_entry = GTK_COMBO_BOX_TEXT(gtk_builder_get_object(builder, "method_dropdown"));
    GtkCheckButton *db_checkbox = GTK_CHECK_BUTTON(gtk_builder_get_object(builder, "db_checkbox"));
    GtkCheckButton *window_checkbox = GTK_CHECK_BUTTON(gtk_builder_get_object(builder, "window_checkbox"));
    GtkCheckButton *file_checkbox = GTK_CHECK_BUTTON(gtk_builder_get_object(builder, "file_checkbox"));
    gboolean db_checkbox_isChecked = gtk_toggle_button_get_active(GTK_TOGGLE_BUTTON(db_checkbox));
    gboolean window_checkbox_isChecked = gtk_toggle_button_get_active(GTK_TOGGLE_BUTTON(window_checkbox));
    gboolean file_checkbox_isChecked = gtk_toggle_button_get_active(GTK_TOGGLE_BUTTON(file_checkbox));

    const gchar *url = gtk_entry_get_text(GTK_ENTRY(url_entry));
    const gchar *method = gtk_combo_box_text_get_active_text(method_entry);
    if (mystrcmp(method, "GET") != 0) {
        custom_notify("dialog-error", mystrcat(method, " method is not available yet", "!"));
        return;
    }
    if (url) {
        char *result = curl(url, method);
        if (result == NULL) {
            error_notify();
            return;
        }
        success_notify();
        if (window_checkbox_isChecked) {
            GtkWidget *result_textview = GTK_WIDGET(gtk_builder_get_object(builder, "result_textview_make_query"));
            GtkTextBuffer *text_buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(result_textview));
            gtk_text_buffer_set_text(text_buffer, (gchar*)result, strlen(result));
        }
        if (file_checkbox_isChecked) {
            char fileName[256];
            generateUniqueFileName(fileName, sizeof(fileName));
            char *filename = mystrcat("./data/output/", fileName, ".json");
            if (saveStringToFile(filename, result))
                custom_notify("file", mystrcat("Your file is available in:\ndata/output/", (const char*)fileName, ".json"));
        }
    } else {
        error_notify();
    }
}

static void on_submit_config_database_form(GtkButton *button, gpointer user_data)
{
    GtkWidget *bdd_name_entry = GTK_WIDGET(gtk_builder_get_object(builder, "bdd_name_entry"));
    const gchar *bdd_name = gtk_entry_get_text(GTK_ENTRY(bdd_name_entry));

    GtkComboBoxText *bbd_user_entry = GTK_COMBO_BOX_TEXT(gtk_builder_get_object(builder, "bbd_user_entry"));
    const gchar *bdd_user = gtk_combo_box_text_get_active_text(bbd_user_entry);

    GtkComboBoxText *bdd_password_entry = GTK_COMBO_BOX_TEXT(gtk_builder_get_object(builder, "bdd_password_entry"));
    const gchar *bdd_password = gtk_combo_box_text_get_active_text(bdd_password_entry);

    GtkComboBoxText *bdd_host_entry = GTK_COMBO_BOX_TEXT(gtk_builder_get_object(builder, "bdd_host_entry"));
    const gchar *bdd_host = gtk_combo_box_text_get_active_text(bdd_host_entry);
    
    if (bdd_name == NULL || bdd_user == NULL || bdd_password == NULL || bdd_host == NULL) {
        custom_notify("dialog-error", "Fill in all the fields.");
        return;
    }
    if (configure_database(bdd_host, bdd_user, bdd_password, bdd_name) == 0)
        success_notify();
    else
        error_notify();
}

// Callback pour gérer le clic sur le bouton "About Us"
void go_config_database_page(GtkButton *button, gpointer user_data) {
    gtk_widget_hide(make_query);
    gtk_widget_show(config_database);
}

// Callback pour gérer le clic sur le bouton "Home"
void go_make_query_page(GtkButton *button, gpointer user_data) {
    gtk_widget_hide(config_database);
    gtk_widget_show(make_query);
}

int gtk(int argc, char *argv[]) {
    // Initialisation de GTK+
    gtk_init(&argc, &argv);

    if (!notify_init("Cook master Api")) {
        g_error("Failed to initialize libnotify.");
    }

    // Création d'une instance de GtkBuilder et chargement des fichiers de glade
    builder = gtk_builder_new();
    GError *error = NULL;
    if (gtk_builder_add_from_file(builder, "./src/gtk/make_query.glade", &error) == 0 || gtk_builder_add_from_file(builder, "./src/gtk/config_database.glade", &error) == 0) {
        g_printerr("Error loading file: %s\n", error->message);
        g_clear_error(&error);
        return 1;
    }

    // Récupération des widgets depuis les fichiers de glade
    make_query = GTK_WIDGET(gtk_builder_get_object(builder, "make_query_builder"));
    config_database = GTK_WIDGET(gtk_builder_get_object(builder, "config_database_builder"));
    
    GtkWidget *switch_config_database = GTK_WIDGET(gtk_builder_get_object(builder, "switch_config_database"));
    GtkWidget *switch_query_page = GTK_WIDGET(gtk_builder_get_object(builder, "switch_query_page"));
    g_signal_connect(switch_config_database, "clicked", G_CALLBACK(go_config_database_page), NULL);
    g_signal_connect(switch_query_page, "clicked", G_CALLBACK(go_make_query_page), NULL);
        
    GtkWidget *submit_make_query_form = GTK_WIDGET(gtk_builder_get_object(builder, "submit_make_query_form"));
    GtkWidget *submit_config_database_form = GTK_WIDGET(gtk_builder_get_object(builder, "submit_config_database_form"));

    // Connexion des signaux aux callbacks
    g_signal_connect(submit_make_query_form, "clicked", G_CALLBACK(on_submit_make_query_form), NULL);
    g_signal_connect(submit_config_database_form, "clicked", G_CALLBACK(on_submit_config_database_form), NULL);

    gtk_builder_connect_signals(builder, NULL);

    // Affichage de la fenêtre principale
    gtk_widget_show(make_query);
    // Boucle principale GTK+
    gtk_main();
    return 0;
}
