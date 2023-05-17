<?php
    // variabele declareren
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtword = $_POST['wachtword'];
    $address = $_POST['address'];
    $stad = $_POST['stad'];
    $role = $_POST['role'];
    
    // wachtwoord hashen
    $hashed_wachtwoord = password_hash($wachtword, PASSWORD_DEFAULT);

    require 'database.php';

    $sql = "INSERT INTO users (firstname, lastname, email, password, address, city, role)
    VALUES ('$voornaam', '$achternaam', '$email', '$hashed_wachtwoord', '$address', '$stad', '$role')";

    // Voer de INSERT INTO STATEMENT uit
    if(mysqli_query($conn, $sql)){
        header("location: tools-overzicht.php");
    }
?>