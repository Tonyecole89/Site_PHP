<?php
session_start();
$_SESSION=[];
if (!isset($_SESSION["utilisateur"])) {
    header("Location: http://localhost/index.php");  
}
?>
<?php require("./partials/header.php"); ?>
