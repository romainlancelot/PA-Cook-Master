#include <stdio.h>
#include <time.h>

void generateUniqueFileName(char* fileName, size_t maxLength) {
    time_t currentTime = time(NULL);
    struct tm* timeInfo = localtime(&currentTime);

    strftime(fileName, maxLength, "%Y%m%d_%H%M%S", timeInfo);
}
