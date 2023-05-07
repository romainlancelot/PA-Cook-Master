#include <gtk/gtk.h>
#include "curl.h"

static void on_send_button_clicked(GtkButton *button, gpointer user_data)
{
    GtkWidget *url_entry = GTK_WIDGET(gtk_builder_get_object(GTK_BUILDER(user_data), "url_entry"));
    GtkWidget *apikey_entry = GTK_WIDGET(gtk_builder_get_object(GTK_BUILDER(user_data), "apikey_entry"));
    GtkComboBoxText *method_entry = GTK_COMBO_BOX_TEXT(gtk_builder_get_object(GTK_BUILDER(user_data), "method_dropdown"));
    const gchar *url = gtk_entry_get_text(GTK_ENTRY(url_entry));
    const gchar *apikey = gtk_entry_get_text(GTK_ENTRY(apikey_entry));
    const gchar *method = gtk_combo_box_text_get_active_text(method_entry);
    if (url) {
        char *result = curl(url, apikey, method);
        GtkWidget *result_textview = GTK_WIDGET(gtk_builder_get_object(GTK_BUILDER(user_data), "result_textview"));
        GtkTextBuffer *text_buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(result_textview));
        gtk_text_buffer_set_text(text_buffer, (gchar*)result, strlen(result));
    }
}

int gtk(int argc, char *argv[])
{
    GtkBuilder *builder;
    GtkWidget *window;
    GError *error = NULL;

    gtk_init(&argc, &argv);

    builder = gtk_builder_new();
    if (gtk_builder_add_from_file(builder, "interface.glade", &error) == 0) {
        g_printerr("Error loading file: %s\n", error->message);
        g_clear_error(&error);
        return 1;
    }

    window = GTK_WIDGET(gtk_builder_get_object(builder, "main_window"));
    gtk_builder_connect_signals(builder, NULL);

    gtk_widget_show(window);

    g_signal_connect(G_OBJECT(window), "destroy", G_CALLBACK(gtk_main_quit), NULL);

    g_signal_connect(GTK_BUTTON(gtk_builder_get_object(builder, "send_button")), "clicked", G_CALLBACK(on_send_button_clicked), builder);

    gtk_main();

    return 0;
}
