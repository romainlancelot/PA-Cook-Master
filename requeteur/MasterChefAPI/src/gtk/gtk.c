#include <gtk/gtk.h>
#include <libnotify/notify.h>
#include "curl.h"
#include "gtk.h"

// Déclaration des pointeurs pour les builder et widgets
GtkBuilder *builder;
GtkWidget *window_home;
GtkWidget *window_about_us;

static void on_send_requiest_button_clicked(GtkButton *button, gpointer user_data)
{
    GtkWidget *url_entry = GTK_WIDGET(gtk_builder_get_object(GTK_BUILDER(user_data), "url_entry"));
    GtkWidget *apikey_entry = GTK_WIDGET(gtk_builder_get_object(GTK_BUILDER(user_data), "apikey_entry"));
    GtkComboBoxText *method_entry = GTK_COMBO_BOX_TEXT(gtk_builder_get_object(GTK_BUILDER(user_data), "method_dropdown"));
    const gchar *url = gtk_entry_get_text(GTK_ENTRY(url_entry));
    const gchar *apikey = gtk_entry_get_text(GTK_ENTRY(apikey_entry));
    const gchar *method = gtk_combo_box_text_get_active_text(method_entry);
    if (url) {
        success_notify();
        char *result = curl(url, apikey, method);
        GtkWidget *result_textview = GTK_WIDGET(gtk_builder_get_object(GTK_BUILDER(user_data), "result_textview"));
        GtkTextBuffer *text_buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(result_textview));
        gtk_text_buffer_set_text(text_buffer, (gchar*)result, strlen(result));
    } else {
        error_notify();
    }
}

// Callback pour gérer le clic sur le bouton "About Us"
void on_about_us_clicked(GtkButton *button, gpointer user_data) {
    gtk_widget_hide(window_home);
    gtk_widget_show(window_about_us);
}

// Callback pour gérer le clic sur le bouton "Home"
void on_home_clicked(GtkButton *button, gpointer user_data) {
    gtk_widget_hide(window_about_us);
    gtk_widget_show(window_home);
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
    if (gtk_builder_add_from_file(builder, "/home/najma/Documents/esgi/cookmaster/PA-Cook-Master/requeteur/MasterChefAPI/src/gtk/home.glade", &error) == 0 || gtk_builder_add_from_file(builder, "/home/najma/Documents/esgi/cookmaster/PA-Cook-Master/requeteur/MasterChefAPI/src/gtk/about_us.glade", &error) == 0) {
        g_printerr("Error loading file: %s\n", error->message);
        g_clear_error(&error);
        return 1;
    }

    // Récupération des widgets depuis les fichiers de glade
    window_home = GTK_WIDGET(gtk_builder_get_object(builder, "window_home"));
    window_about_us = GTK_WIDGET(gtk_builder_get_object(builder, "window_about_us"));
    GtkWidget *button_about_us = GTK_WIDGET(gtk_builder_get_object(builder, "button_about_us"));
    GtkWidget *button_home = GTK_WIDGET(gtk_builder_get_object(builder, "button_home"));
    GtkWidget *send_requiest_button = GTK_WIDGET(gtk_builder_get_object(builder, "send_requiest_button"));

    // Connexion des signaux aux callbacks
    g_signal_connect(send_requiest_button, "clicked", G_CALLBACK(on_send_requiest_button_clicked), NULL);
    g_signal_connect(button_about_us, "clicked", G_CALLBACK(on_about_us_clicked), NULL);
    g_signal_connect(button_home, "clicked", G_CALLBACK(on_home_clicked), NULL);
    // Affichage de la fenêtre principale
    gtk_widget_show(window_home);
    // Boucle principale GTK+
    gtk_main();
    return 0;
}
