#include <stdio.h>
#include <stdlib.h>
#include <curl/curl.h>
#include <mysql.h>
#include <string.h>

// Fonction qui exécute une requête SQL et retourne le résultat
MYSQL_RES* execute_query(MYSQL *conn, const char *query) {
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

int main(int argc, char **argv) {
    // Connexion à la base de données
    MYSQL *conn = mysql_init(NULL);
    if (conn == NULL) {
        fprintf(stderr, "Erreur lors de l'initialisation de la connexion : %s\n", mysql_error(conn));
        exit(1);
    }
    if (mysql_real_connect(conn, "localhost", "cookmaster_User", "c00km@st3r_p@ssw0rd", "cookmaster_Db", 0, NULL, 0) == NULL) {
        fprintf(stderr, "Erreur lors de la connexion à la base de données : %s\n", mysql_error(conn));
        mysql_close(conn);
        exit(1);
    }
    
    // Exécution d'une requête SQL
    MYSQL_RES *res = execute_query(conn, "SELECT * FROM Users");
    if (res == NULL) {
        fprintf(stderr, "Erreur lors de l'exécution de la requête.\n");
        mysql_close(conn);
        exit(1);
    }
    
    // Initialisation de CURL
    CURL *curl = curl_easy_init();
    if (curl == NULL) {
        fprintf(stderr, "Erreur lors de l'initialisation de CURL.\n");
        mysql_free_result(res);
        mysql_close(conn);
        exit(1);
    }
    
    // Configuration de CURL pour envoyer une requête POST avec les résultats de la requête SQL
    char post_data[1024] = {0};
    MYSQL_ROW row;
    while ((row = mysql_fetch_row(res)) != NULL) {
        snprintf(post_data + strlen(post_data), sizeof(post_data) - strlen(post_data) - 1, "%s|%s\n", row[0], row[1]);
    }
    curl_easy_setopt(curl, CURLOPT_URL, "http://example.com/post.php");
    curl_easy_setopt(curl, CURLOPT_POSTFIELDS, post_data);
    
    // Envoi de la requête CURL
    CURLcode res_curl = curl_easy_perform(curl);
    if (res_curl != CURLE_OK) {
        fprintf(stderr, "Erreur lors de l'envoi de la requête CURL : %s\n", curl_easy_strerror(res_curl));
    }
    
    // Nettoyage
    curl_easy_cleanup(curl);
    mysql_free_result(res);
    mysql_close(conn);
    
    return 0;
}

// gcc -o test_curl test_curl.c -lcurl `mysql_config --cflags --libs`
