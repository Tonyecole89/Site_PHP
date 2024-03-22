<?php session_start(); ?>
<?php if (isset($_SESSION['utilisateur'])) {
    header("Location: http://localhost/index.php");
} ?>
<?php require("./classes/Utilisateur.php"); ?>
<?php require("./modeles/utilisateur.php"); ?>
<?php 
if ($_POST != []) 
{
    $erreur = [];

    if (checkEmail($_POST['email'])) {
        $erreur['email'] = "cet email est déjà enregistrer";
    }

    if (checkPseudo($_POST['pseudo'])) {
        $erreur['pseudo'] = "ce pseudo est déjà enregistrer";
    }

    if (!isset($_POST['email']) || !preg_match('/^(\w|(\w+\-+\w))+@+(\w{1,8}+\.+\w{2,3})$/', $_POST['email'])) {
        $erreur['email'] = "le format de l'email n'est pas bon";
    }

    if (!isset($_POST['pseudo']) || !preg_match('/^[a-z]{1,8}$/', $_POST['pseudo'])) {
        $erreur['pseudo'] = "le pseudo ne doit contenir que des caractères de 'a' à 'z' et entre 1 à 8 caractères";
    }

    if (!isset($_POST['nom']) || !preg_match('/^[a-z]{1,15}$/', $_POST['nom'])) {
        $erreur['nom'] = "le nom ne doit contenir que des caractères de 'a' à 'z' et entre 1 à 15 caractères";
    }
  
    if (!isset($_POST['prenom']) || !preg_match('/^[a-z]{1,15}$/', $_POST['prenom'])) {
        $erreur['prenom'] = "le prenom ne doit contenir que des caractères de 'a' à 'z' et entre 1 à 15 caractères";
    }
  
    if (!isset($_POST['mdp']) || !preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@\/=\+#*!])[a-zA-Z0-9@\/=\+#*!]{8,20}$/', $_POST['mdp'])) {
        $erreur['mdp'] = "le password doit contenir au moins 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spécial (@, /, +, #, *, !, =) et entre 8 et 20 caractères";
    }

    if (!isset($_POST['num_tel']) || !preg_match('/^[0-9]{9,12}$/', $_POST['num_tel'])) {
        $erreur['num_tel'] = 'votre numéro de téléphone ne doit contenir que des chiffres';
    }
    if ($erreur == []) {
        $utilisateur = new Utilisateur();
        foreach ($_POST as $key=>$value) {
        if ($key == "mdp") {
            $utilisateur->setMDP($value);
        } else {
            $utilisateur -> $key = $value;
        }
        }
        createtUtilisateur($utilisateur);
        header("Location: http://localhost/index.php");
        exit;
    }
}
?>
<?php require("./partials/header.php"); ?>
    <main>
        <form class="w-75 mx-auto my-5 border p-2" action="" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control"  name="email" id="email" value="email@gmail.com">
                    <?= isset($erreur['email']) ? "<h5>".$erreur['email']."</h5>" : "" ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" name="pseudo" id="pseudo" value="Mettez Votre Pseudo">
                    <?= isset($erreur['pseudo']) ? "<h5>".$erreur['pseudo']."</h5>" : "" ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" name="nom" id="nom" value="Mettez Votre Nom">
                    <?= isset($erreur['nom']) ? "<h5>".$erreur['nom']."</h5>" : "" ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" name="prenom" id="prenom" value="Mettez Votre Prénom">
                    <?= isset($erreur['prenom']) ? "<h5>".$erreur['prenom']."</h5>" : "" ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="mdp" id="mdp">
                    <?= isset($erreur['mdp']) ? "<h5>".$erreur['mdp']."</h5>" : "" ?>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Numéro de téléphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="num_tel" id="num_tel" value="06...">
                    <?= isset($erreur['num_tel']) ? "<h5>".$erreur['num_tel']."</h5>" : "" ?>
                </div>
            </div>

            <button class = "btn btn-secondary mt-3">Valider</button>
        </form>
    </main>
</body>
</html>
