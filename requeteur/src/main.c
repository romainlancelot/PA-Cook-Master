#include "gtk.h"

int main(int ac, char **av)
{
    gtk(ac, av);
    return (0);
}

// #include <stdio.h>
// #include <stdlib.h>
// #include <string.h>
// #include <curl/curl.h>
// #include <jansson.h>

// struct string {
//   char *ptr;
//   size_t len;
// };

// void init_string(struct string *s) {
//   s->len = 0;
//   s->ptr = malloc(s->len+1);
//   if (s->ptr == NULL) {
//     fprintf(stderr, "malloc() failed\n");
//     exit(EXIT_FAILURE);
//   }
//   s->ptr[0] = '\0';
// }

// size_t writefunc(void *ptr, size_t size, size_t nmemb, struct string *s)
// {
//   size_t new_len = s->len + size*nmemb;
//   s->ptr = realloc(s->ptr, new_len+1);
//   if (s->ptr == NULL) {
//     fprintf(stderr, "realloc() failed\n");
//     exit(EXIT_FAILURE);
//   }
//   memcpy(s->ptr+s->len, ptr, size*nmemb);
//   s->ptr[new_len] = '\0';
//   s->len = new_len;

//   return size*nmemb;
// }

// char* trouver_premier_mot_entre_guillemets(const char* chaine) {
//     char* debut_guillemet = strchr(chaine, '"');
//     if (debut_guillemet != NULL) {
//         char* fin_guillemet = strchr(debut_guillemet + 1, '"');
//         if (fin_guillemet != NULL) {
//             int taille_mot = fin_guillemet - (debut_guillemet + 1);
//             char* mot = malloc((taille_mot + 1) * sizeof(char));
//             strncpy(mot, debut_guillemet + 1, taille_mot);
//             mot[taille_mot] = '\0';
//             return mot;
//         }
//     }
//     return NULL;
// }

// void parse_json(const char* json_str)
// {
//     json_error_t error;
//     json_t* root = json_loads(json_str, 0, &error);

//     if (!root) {
//         fprintf(stderr, "error: on line %d: %s\n", error.line, error.text);
//         return;
//     }

//     if (!json_is_object(root)) {
//         fprintf(stderr, "error: root is not an object\n");
//         json_decref(root);
//         return;
//     }
//     json_t* meals = json_object_get(root, trouver_premier_mot_entre_guillemets(json_str));

//     if (!json_is_array(meals)) {
//         fprintf(stderr, "error: meals is not an array\n");
//         json_decref(root);
//         return;
//     }

//     for (int i = 0; i < json_array_size(meals); i++) {
//         json_t* data = json_array_get(meals, i);
//         // Pour chaque élément dans le tableau JSON, affichez tous les champs
//         const char *key;
//         json_t *value;

//         json_object_foreach(data, key, value) {
//             printf("%s: %s\n", key, json_string_value(value));
//         }
//     }

//     json_decref(root);
// }

// int main(void)
// {
//   CURL *curl;
//   CURLcode res;

//   curl_global_init(CURL_GLOBAL_DEFAULT);

//   curl = curl_easy_init();
//   if(curl) {
//     struct string s;
//     init_string(&s);

//     curl_easy_setopt(curl, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/ditto");
//     curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writefunc);
//     curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);

//     res = curl_easy_perform(curl);

//     if(res != CURLE_OK)
//       fprintf(stderr, "curl_easy_perform() failed: %s\n",
//               curl_easy_strerror(res));

//     // Now that we have our result, we can parse it
//     parse_json(s.ptr);

//     free(s.ptr);

//     curl_easy_cleanup(curl);
//   }

//   curl_global_cleanup();

//   return 0;
// }
