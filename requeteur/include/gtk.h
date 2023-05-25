#ifndef __GTK__
    #define __GTK__

typedef struct gtk_s {

} gtk_t;

void error_notify();
void success_notify();
void custom_notify();
int gtk(int argc, char *argv[]);
#endif /*__GTK__*/