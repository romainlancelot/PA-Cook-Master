#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char* mystrcat(const char* str1, const char* str2, const char* str3) {
    size_t len1 = strlen(str1);
    size_t len2 = strlen(str2);
    size_t len3 = strlen(str3);

    size_t lenTotal = len1 + len2 + len3 + 1;

    char* result = (char*)malloc(lenTotal * sizeof(char));
    if (result == NULL) {
        printf("Memory allocation failed.\n");
        return NULL;
    }

    strcpy(result, str1);
    strcat(result, str2);
    strcat(result, str3);

    return result;
}
