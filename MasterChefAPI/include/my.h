#include <stdbool.h>

#ifndef __MY_LIB__
    #define __MY_LIB__

char* mystrcat(const char* str1, const char* str2, const char* str3);
int my_strlen(char *string);
bool saveStringToFile(const char* filePath, const char* content);
void generateUniqueFileName(char* fileName, size_t maxLength);
int mystrcmp(const char* str1, const char* str2);
#endif /*__MY_LIB__*/
