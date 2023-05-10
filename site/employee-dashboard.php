<?php

    // is de gebruiker ingelogd??
    session_start();
    if(!isset($_SESSION['isIngelogd'])){
        header("location: inloggen.php");
        exit;
    }

    // is de grbuiker een employee
    if($_SESSION['role'] != "employee"){
        header("location: store.php");
        exit;
    }