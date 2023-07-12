##
## Descriptif fonctionnel détaillé et numéroté de la partie C
##

# Interface utilisateur :
    - Conception d'une interface utilisateur conviviale pour permettre aux utilisateurs de rechercher des recettes, des ingrédients, des vins, etc.
    - Ajout d'options pour permettre aux utilisateurs de filtrer les résultats en fonction de leurs préférences, comme le type de plat, le régime alimentaire, le temps de préparation, etc.

# Gestion des requêtes :
    - Création de fonctions pour envoyer des requêtes à l'API de cuisine sélectionnée (comme Spoonacular, WinePair API, etc.) à l'aide de la bibliothèque CURL.
    - Gestion des réponses JSON ou texte renvoyées par l'API pour extraire les données pertinentes (telles que les ingrédients, les instructions, les photos, les prix, etc.).
    - Traitement des erreurs d'API (par exemple, des requêtes qui ne renvoient pas de résultats ou des erreurs de connexion) et retour des messages d'erreur appropriés à l'utilisateur.

# Fonctionnalités avancées :
    - Intégration de fonctions de frigo intelligent pour aider les utilisateurs à trouver des recettes à partir des ingrédients qu'ils ont déjà dans leur frigo.
    - Gestion des allergènes pour permettre aux utilisateurs de rechercher des recettes qui ne contiennent pas certains allergènes.
    - Intégration d'autres API de cuisine pertinentes (comme Burgers Hub, par exemple) pour fournir une variété de résultats aux utilisateurs.
    - Ajout de fonctionnalités de recommandation de recettes en fonction des préférences de l'utilisateur, de son historique de recherche, de ses recettes préférées, etc.


libharu : C'est une bibliothèque de création de fichiers PDF en C. Elle permet de générer des fichiers PDF à partir de vos données, en leur donnant une mise en forme personnalisée. Vous pouvez utiliser cette bibliothèque pour afficher les données dans un format PDF.


    // Init list
    window->list = gtk_tree_view_new();
    window->store = gtk_list_store_new(2, G_TYPE_STRING, G_TYPE_STRING);
    gtk_tree_view_set_model(GTK_TREE_VIEW(window->list), GTK_TREE_MODEL(window->store));
    g_object_unref(window->store);

    // Column for meal names
    GtkCellRenderer *renderer = gtk_cell_renderer_text_new();
    GtkTreeViewColumn *column = gtk_tree_view_column_new_with_attributes("Recette", renderer, "text", 0, NULL);
    gtk_tree_view_append_column(GTK_TREE_VIEW(window->list), column);

    // Column for meal categories
    renderer = gtk_cell_renderer_text_new();
    column = gtk_tree_view_column_new_with_attributes("Catégorie", renderer, "text", 1, NULL);
    gtk_tree_view_append_column(GTK_TREE_VIEW(window->list), column);

    // Add list to window
    gtk_container_add(GTK_CONTAINER(box), window->list);
