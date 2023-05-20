#include <stdio.h>
#include <string.h>
#include <stdbool.h>

bool saveStringToFile(const char* filePath, const char* content) {
    FILE* file = fopen(filePath, "a+");
    if (file == NULL) {
        printf("Erreur lors de l'ouverture du fichier.\n");
        return false;
    }
    fprintf(file, "%s", content);
    fclose(file);
    return (true);
}