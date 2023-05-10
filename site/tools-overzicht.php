<?php
session_start();
require 'database.php';

//de sql query
$sql = "SELECT * FROM tools";

//hier wordt de query uitgevoerd met de database
$result = mysqli_query($conn, $sql);

/**
 * Hier wordt het resultaat ($result) omgezet
 * in een *multidimensionale associatieve array
 * in dit voorbeeld staat $all_tools maar dit mag
 * voor bijvoorbeeld producten $all_products heten.
 * Maar dit kies je zelf
 */
$all_tools = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="tools-overzicht.php" method="POST">
        <input id="search" name="search" type="text" placeholder="Type here">
        <input id="submit" type="submit" name="submit" value="Search">
    </form>


    <?php
    if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $sql2 = "SELECT * FROM tools WHERE tool_name LIKE '%$search%'";

            $result2 = mysqli_query($conn, $sql2);

            $searchtools = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    ?>
            <table>
                <thead>
                    <th>tool_id</th>
                    <th>tool_name</th>
                    <th>tool_category</th>
                    <th>tool_price</th>
                    <th>tool_brand</th>
                    <th><a href="nieuw-product.php">nieuw product</a></th>
                    <th><a href="users-overzicht.php">gebruikers</a></th>
                </thead>
                <?php foreach ($searchtools as $toolos) : ?>
                    <tbody>
                        <td><?php echo $toolos["tool_id"] ?></td>
                        <td><?php echo $toolos["tool_name"] ?></td>
                        <td><?php echo $toolos["tool_category"] ?></td>
                        <td>&euro; <?php echo $toolos["tool_price"] ?></td>
                        <td><?php echo $toolos["tool_brand"] ?></td>
                        <td><a href="tools-detail.php?id=<?php echo $toolos['tool_id'] ?>">verdere info</a></td>
                    </tbody>
                <?php endforeach; ?>

            </table>
        <?php
    }

    if (empty($_POST['submit'])) {
        ?>
        <table>
            <thead>
                <th>tool_id</th>
                <th>tool_name</th>
                <th>tool_category</th>
                <th>tool_price</th>
                <th>tool_brand</th>
                <th><a href="nieuw-product.php">nieuw product</a></th>
                <th><a href="users-overzicht.php">gebruikers</a></th>
            </thead>
            <?php foreach ($all_tools as $tool) : ?>
                <tbody>
                    <td><?php echo $tool["tool_id"] ?></td>
                    <td><?php echo $tool["tool_name"] ?></td>
                    <td><?php echo $tool["tool_category"] ?></td>
                    <td>&euro; <?php echo $tool["tool_price"] ?></td>
                    <td><?php echo $tool["tool_brand"] ?></td>
                    <td><a href="tools-detail.php?id=<?php echo $tool['tool_id'] ?>">verdere info</a></td>
                </tbody>
            <?php endforeach; ?>

        </table>
    <?php
    }

    ?>


    <!-- /**
    * Hier loop (iterate) je over alle waardes die gevonden zijn.
    * Je kunt zoals je zien paragraaf-tags gebruiken
    * maar je kunt ook andere HTML-**tags** gebruiken
    */ -->




</body>

</html>