<?php
    // variabele declareren
    $naam = $_POST['naamProduct'];
    $category = $_POST['categoryProduct'];
    $prijs = $_POST['prijsProduct'];
    $merk = $_POST['merkProduct'];

    require 'database.php';

    $sql = "INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand)
    VALUES ('$naam', '$category', '$prijs', '$merk')";

    // Voer de INSERT INTO STATEMENT uit
    if(mysqli_query($conn, $sql)){
        header("location: tools-overzicht.php");
    }
?>