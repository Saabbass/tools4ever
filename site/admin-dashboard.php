<?php
session_start();
require 'database.php';
require 'vendor/autoload.php';

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

use Carbon\Carbon;

// printf("Now: %s", Carbon::now());
// printf("Het is vandaag %s", Carbon::now()->toDateTimeString());

$tomorrow = Carbon::now('Europe/Amsterdam')->addDay(9);
$datumovernegendagen = $tomorrow->locale('nl')->isoFormat('dddd, MMMM Do YYYY, hh:mm:ss');

$today = Carbon::now('Europe/Amsterdam');
$datumvandaag = $today->locale('nl')->isoFormat('dddd, MMMM Do YYYY, hh:mm:ss');

// $timestamp = time();
// echo "Welkom" . " " . $_SESSION['voornaam'] . "</br>";
// echo "Het is vandaag " . date('d-m-Y', $timestamp);

?>

<h1>
    de datum van vandaag is: <?php echo $datumvandaag ?>
</h1>

<?php


$employeeQuery = "SELECT COUNT('role') as emp FROM users WHERE role = 'employee'";

$employeeResult = mysqli_query($conn, $employeeQuery);

$employeeCount = mysqli_fetch_assoc($employeeResult);

echo "</br>Het aantal employees is " . $employeeCount['emp'];



$sql = "SELECT AVG(tool_price) as price FROM tools";

$result = mysqli_query($conn, $sql);

$all_tools = mysqli_fetch_assoc($result);

echo "</br>De gemiddelde prijs is " . $all_tools['price'];



$toolcatagory = "SELECT AVG(tool_price) as price, tool_category FROM tools GROUP BY tool_category";

$toolcatavg = mysqli_query($conn, $toolcatagory);

$avgcat = mysqli_fetch_all($toolcatavg, MYSQLI_ASSOC);

// echo "</br>De gemiddelde prijs is " . $avgcat['price'];

?>
<section class="first_section">
    
</section>

<section class="second_section">
    <table>
        <thead>
            <th>Category</th>
            <th>De gemiddelde prijs is</th>
        </thead>
        <?php foreach ($avgcat as $avgcats) : ?>
            <tbody>
                <td><?php echo $avgcats['tool_category']; ?></td>
                <td><?php echo round($avgcats['price'], 2); ?></td>
    
            </tbody>
        <?php endforeach; ?>
    
    </table>
</section>

<section class="third_section">
    <a href="instellingen.php">De gebruikersinstellingen</a>
</section>