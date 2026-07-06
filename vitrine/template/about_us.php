<?php
session_start();

if(!$_SESSION['password']){
    header("Location: connexion.php");
    exist();
}
?>