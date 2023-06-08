<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . "405 Method Not Allowed", true, 405);
    include '405.php';
    exit;
}

//We controleren of de key email in de POST-array bestaat
if (!isset($_POST['email'])) {
    header("location: inloggen.php");
    exit;
}

//daarna controleren we of het emailadres is ingevuld (dus niet leeg)
if (empty($_POST['email'])) {
    header("location: inloggen.php");
    exit;
}

//dan komt hier de rest van de code..

//het eerste input field met een name attribuut 'email'
$email = $_POST['email'];

//we hebben een database connctie nodig
require 'database.php';
//we gaan nu het emailadres dat is ingevuld vergeiljken met de waardes in de database.

$sql = "SELECT * FROM users WHERE email = '$email'"; // check de single-qoutes naast email

//dan voeren we de query uit:
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if(!is_array($user)){
    header("location: inloggen.php");
    exit;
}

if (password_verify($_POST['password'], $user['password'])) {
    session_start();
    $_SESSION['isIngelogd'] = true;
    $_SESSION['voornaam'] = $user['firstname'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['id'] = $user['id'];

    // if ($user['role'] == 'administrator') {
    //     header("location: admin-dashboard.php");
    //     exit;
    // }
    // if ($user['role'] == 'employee') {
    //     header("location: employee-dashboard.php");
    //     exit;
    // }

    switch ($user['role']) {
        case 'administrator':
            header("location: admin-dashboard.php");
            exit;
            break;
        case 'employee':
            header("location: employee-dashboard.php");
            exit;
            break;
        case 'customer':
            header("location: store.php");
            exit;
            break;

        default:
            header("location: store.php");
            exit;
            break;
    }

    header("location: dashboard.php");
    exit;
}

//We controleren of de key email in de POST-array bestaat
if ($_POST['password'] !== $user["password"]) {
    header("location: inloggen.php");
    exit;
}

//daarna controleren we of het emailadres is ingevuld (dus niet leeg)
if (empty($_POST['password'])) {
    header("location: inloggen.php");
    exit;
}

// function validate($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// $email = validate($_POST['email']);
// $pass = validate($_POST['password']);

// // $email = $_POST['email'];
// // $pass = $_POST['password'];

// $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

// $result = mysqli_query($conn, $sql);

// $user = mysqli_fetch_assoc($result);

// if(!is_array($user)){
//     echo "Deze gebruiker is bij ons onbekend!";
//     exit;
// }

// if($_POST['password'] !== $user["password"]){
//     echo 'Deze gebruiker is onbekend of heeft een onjuist wachtword opgegeven';
//     exit;

// }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Welkom 
    </h1>
</body>
</html> -->