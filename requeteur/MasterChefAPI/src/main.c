#include <gtk/gtk.h>

void on_send_button_clicked(GtkButton *button, gpointer user_data) {
    const gchar *text = gtk_entry_get_text(GTK_ENTRY(user_data));
    g_print("Le texte saisi est : %s\n", text);
}

int main(int argc, char *argv[]) {
    GtkWidget *window;
    GtkWidget *grid;
    GtkWidget *label;
    GtkWidget *entry;
    GtkWidget *button;

    gtk_init(&argc, &argv);

    window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Bienvenue sur notre requêteur d'API !");
    gtk_container_set_border_width(GTK_CONTAINER(window), 10);
    gtk_widget_set_size_request(window, 400, 200);

    grid = gtk_grid_new();
    gtk_container_add(GTK_CONTAINER(window), grid);

    label = gtk_label_new("Veuillez saisir les informations nécessaires pour interroger l'API :");
    gtk_grid_attach(GTK_GRID(grid), label, 0, 0, 1, 1);

    entry = gtk_entry_new();
    gtk_entry_set_placeholder_text(GTK_ENTRY(entry), "Saisissez ici...");
    gtk_grid_attach(GTK_GRID(grid), entry, 0, 1, 1, 1);

    button = gtk_button_new_with_label("Envoyer");
    g_signal_connect(button, "clicked", G_CALLBACK(on_send_button_clicked), entry);
    gtk_grid_attach(GTK_GRID(grid), button, 0, 2, 1, 1);

    g_signal_connect(G_OBJECT(window), "destroy", G_CALLBACK(gtk_main_quit), NULL);

    gtk_widget_show_all(window);

    gtk_main();

    return 0;
}
