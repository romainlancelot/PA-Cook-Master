#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <curl/curl.h>
#include <jansson.h>
#include <cjson/cJSON.h>
#include "curl.h"

// void init_string(struct string *s)
// {
//     s->len = 0;
//     s->ptr = malloc(s->len+1);
//     if (s->ptr == NULL) {
//     fprintf(stderr, "malloc() failed\n");
//         exit(EXIT_FAILURE);
//     }
//     s->ptr[0] = '\0';
// }

// size_t writefunc(void *ptr, size_t size, size_t nmemb, struct string *s)
// {
//     size_t new_len = s->len + size*nmemb;
//     s->ptr = realloc(s->ptr, new_len+1);
//     if (s->ptr == NULL) {
//         fprintf(stderr, "realloc() failed\n");
//         exit(EXIT_FAILURE);
//     }
//     memcpy(s->ptr+s->len, ptr, size*nmemb);
//     s->ptr[new_len] = '\0';
//     s->len = new_len;
//     return size*nmemb;
// }

char *curl(const char *url, const char *methode)
{
    // CURL *curl;
    // CURLcode res;

    // curl = curl_easy_init();
    // if (curl) {
    //     struct string s;
    //     init_string(&s);
    //     curl_easy_setopt(curl, CURLOPT_URL, url);
    //     curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writefunc);
    //     curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);
    //     res = curl_easy_perform(curl);
    //     if (res != CURLE_OK)
    //         return (NULL);
    //     curl_easy_cleanup(curl);
    //     cJSON *root = cJSON_Parse(s.ptr);
    //     char *json = cJSON_Print(root);
    //     cJSON_Delete(root);
    //     return (json);
    // }
    return(NULL);
}
