<?php
session_start();
require 'vendor/autoload.php';

use Carbon\Carbon;

// printf("Now: %s", Carbon::now());
// printf("Het is vandaag %s", Carbon::now()->toDateTimeString());

$tomorrow = Carbon::now('Europe/Amsterdam')->addDay(9);
echo $tomorrow->locale('nl')->isoFormat('dddd, MMMM Do YYYY, h:mm:ss');

// is de gebruiker ingelogd??
if (!isset($_SESSION['isIngelogd'])) {
    header("location: inloggen.php");
    exit;
}

// is de grbuiker een administrator
if ($_SESSION['role'] != "administrator") {
    header("location: store.php");
    exit;
}

    // $timestamp = time();


    // echo "Welkom" . " " . $_SESSION['voornaam'] . "</br>";
    // echo "Het is vandaag " . date('d-m-Y', $timestamp);
