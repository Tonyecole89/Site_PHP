Ce site est en PHP, il faudra donc utiliser Docker pour pouvoir le tester.

# Etape 1
Mettez en place la connexion avec une bdd (nommez la comme vous le souhaitez)

# Etape 2 (le MVP)
Mettez en place une classe User qui contiendra les propriétés nécessaires à la création d'utilisateurs en accord avec le formulaire d'inscription (voir `register.html`) et un fichier qui contiendra les fonctions utiles.

# Etape 3 (Bonus)
Mettez en place l'inscription :
- le nom et le prénom ne doivent contenir que des lettres
- plusieurs utilisateurs ne peuvent avoir le même pseudo ou email
- le mot de passe devra être hâché (oui ça se traduit comme ça en français) et contenir au moins 1 minuscule, 1 majuscule et 1 chiffre, et devra compter entre 8 et 20 caractères
- on est redirigé vers l'accueil après l'inscription.

# Etape 4 (Super bonus)
Mettez en place la connexion :
- redirection vers l'accueil si la connexion est réussie, message d'erreur sinon
- être connecté signifie créer une session

# Etape 5 (Méga bonus)
- vous devrez afficher les liens utiles dans le header en fonction de l'existence d'une session
- si l'on est connecté, on verra le message "Bonjour, Mon prénom !"
- on ne doit pas pouvoir accéder aux formulaires de connexion et d'inscription quand on est connecté.
