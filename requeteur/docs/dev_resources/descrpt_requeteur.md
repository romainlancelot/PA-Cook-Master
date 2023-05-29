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
