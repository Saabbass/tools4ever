<?php 
session_start();
if(!isset($_SESSION['isIngelogd'])){
    header("location: inloggen.php");
    exit;
}

echo "welkom" .$_SESSION['voornaam'];