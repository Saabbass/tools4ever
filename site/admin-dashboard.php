<?php

    // is de gebruiker ingelogd??
    session_start();
    if(!isset($_SESSION['isIngelogd'])){
        header("location: inloggen.php");
        exit;
    }

    // is de grbuiker een administrator
    if($_SESSION['role'] != "administrator"){
        header("location: store.php");
        exit;
    }

