int my_strlen(char *string)
{
    int i = 0;

    for (i = 0; string[i] != '\0'; i++);
    return (i);
}