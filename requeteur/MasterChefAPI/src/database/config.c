#include <stdio.h>
#include <stdlib.h>
#include <curl/curl.h>
#include <mysql.h>
#include <string.h>

MYSQL *conn;
// Fonction qui exécute une requête SQL et retourne le résultat
MYSQL_RES* execute_query(const char *query) {
    MYSQL_RES *res = NULL;
    if (mysql_query(conn, query) != 0) {
        fprintf(stderr, "Erreur lors de l'exécution de la requête : %s\n", mysql_error(conn));
    } else {
        res = mysql_store_result(conn);
    }
    return res;
}

// Fonction callback pour CURL qui écrit les données reçues dans une variable
size_t write_callback(char *ptr, size_t size, size_t nmemb, void *userdata) {
    size_t realsize = size * nmemb;
    char *data = (char*)userdata;
    strncat(data, ptr, realsize);
    return realsize;
}

int configure_database(char *host, char *db_user, char* db_password, char *db_name) {
    // Connexion à la base de données
    conn = mysql_init(NULL);
    if (conn == NULL) {
        fprintf(stderr, "Erreur lors de l'initialisation de la connexion : %s\n", mysql_error(conn));
        exit(1);
    }
    if (mysql_real_connect(conn, host, db_user, db_password, db_name, 0, NULL, 0) == NULL) {
        fprintf(stderr, "Erreur lors de la connexion à la base de données : %s\n", mysql_error(conn));
        mysql_close(conn);
        exit(1);
    }
    return (0);
}

int savedata_into_db()
{
    
    return 0;
}
// gcc -o test_curl test_curl.c -lcurl `mysql_config --cflags --libs`