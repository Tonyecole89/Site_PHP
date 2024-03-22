<?php session_start(); ?>
<?php if (isset($_SESSION['utilisateur'])) {
    header("Location: http://localhost/index.php");
} ?>
<?php require("./classes/Utilisateur.php"); ?>
<?php require("./modeles/utilisateur.php"); ?>
<?php 
if ($_POST != [])
{
    $utilisateur = new Utilisateur();
    foreach ($_POST as $key=>$value) {
        if ($key == "mdp") {
            $utilisateur->setMDP($value);
        } else {
            $utilisateur -> $key = $value;
        }
    }
    if (!empty(login($utilisateur))) {
        $_SESSION['utilisateur'] = login($utilisateur);
        header("Location: http://localhost/index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger' role='alert'>La base de donnée n'a pas reconnu l'utilisateur, l'email ou le mot de passe est incorrect</div>";
    }
}
?>

<?php require("./partials/header.php"); ?>
    <main>
        <form class="w-75 mx-auto my-5 border p-2" action="" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" name="email" id="email" value="email@gmail.com">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="mdp" id="mdp">
                </div>
            </div>
            <button class="btn btn-secondary mt-3" type = "submit">Valider</button>
        </form> 
    </main>
</body>
</html>
