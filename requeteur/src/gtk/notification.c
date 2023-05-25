#include <gtk/gtk.h>
#include <libnotify/notify.h>

void error_notify() {
    NotifyNotification *notification;
    notify_init("Error");
    notification = notify_notification_new("Cookmaster API!", "An error occurred", "dialog-error");
    notify_notification_set_timeout(notification, 3000);
    notify_notification_show(notification, NULL);
    g_object_unref(G_OBJECT(notification));
    notify_uninit();
}

void custom_notify(const char *type, const char *message) {
    NotifyNotification *notification;
    notify_init("Error");
    notification = notify_notification_new("Cookmaster API!", message, type);
    notify_notification_set_timeout(notification, 3000);
    notify_notification_show(notification, NULL);
    g_object_unref(G_OBJECT(notification));
    notify_uninit();
}

void success_notify() {
    NotifyNotification *notification;
    notify_init("Success");
    notification = notify_notification_new("Cookmaster API!", "The operation was successful", "dialog-information");
    notify_notification_set_timeout(notification, 3000);
    notify_notification_show(notification, NULL);
    g_object_unref(G_OBJECT(notification));
    notify_uninit();
}
