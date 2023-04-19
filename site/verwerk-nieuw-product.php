<?php
    require 'database.php';

    // var_dump($_SERVER["REQUEST_METHOD"]);
    // die;

    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        // echo 'JE MAG HIER NIET KOMEN MET DIT REQUEST TYPE';
        header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
        include '405.php';
        exit;
    }

    // variabele declareren
    $naam = $_POST['naamProduct'];
    $category = $_POST['categoryProduct'];
    $prijs = $_POST['prijsProduct'];
    $merk = $_POST['merkProduct'];

    $sql = "INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand)
    VALUES ('$naam', '$category', '$prijs', '$merk')";

    // Voer de INSERT INTO STATEMENT uit
    if(mysqli_query($conn, $sql)){
        header("location: tools-overzicht.php");
    }
?>