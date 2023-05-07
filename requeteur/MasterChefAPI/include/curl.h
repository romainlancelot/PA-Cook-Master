#ifndef __CURL__
    #define __CURL__

struct string {
    char *ptr;
    size_t len;
};

char *curl(const char *url, const char *methode, const char *apikey);

#endif /* __CURL__ */
