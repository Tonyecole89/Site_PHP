<?php
require_once("./inc/db.php");

function login($utilisateur) 
{
    require("./inc/db.php");
    $hashedMDP = hash('sha512', $utilisateur->getMDP());
    $sql = "SELECT `nom`, `prenom`, `email` FROM `utilisateur` WHERE `email` = '$utilisateur->email' AND `mdp` = '$hashedMDP';"; 
    $request = $pdo->query($sql);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function createtUtilisateur($utilisateur)
{
    require("./inc/db.php");

    $plainMDP = $utilisateur->getMDP();
    $hashedMDP = hash('sha512', $plainMDP);
    $sql = "INSERT INTO `utilisateur` (`email`, `pseudo`, `nom`, `prenom`, `mdp`, `num_tel`) VALUES(?, ?, ?, ?, ?, ?);";
    $request = $pdo->prepare($sql);
    $request->execute([$utilisateur->email, $utilisateur->pseudo, $utilisateur->nom, $utilisateur->prenom, $hashedMDP, $utilisateur->num_tel]);
}

function checkEmail($email) 
{
    require("./inc/db.php");
    $sql = "SELECT * FROM `utilisateur` WHERE `email` = '$email';";
    $request = $pdo->query($sql);
    $result = $request->fetch(PDO::FETCH_ASSOC);
    return !empty($result);
}

function checkPseudo($pseudo) 
{
    require("./inc/db.php");
    $sql = "SELECT * FROM `utilisateur` WHERE `pseudo` = '$pseudo';";
    $request = $pdo->query($sql);
    $result = $request->fetch(PDO::FETCH_ASSOC);
    return !empty($result);
}