<?php
    session_start();
    require 'database.php';

    //de sql query
    $sql = "SELECT * FROM users";

    //hier wordt de query uitgevoerd met de database
    $result = mysqli_query($conn,$sql);

    /**
     * Hier wordt het resultaat ($result) omgezet
     * in een *multidimensionale associatieve array
     * in dit voorbeeld staat $all_tools maar dit mag
     * voor bijvoorbeeld producten $all_products heten.
     * Maar dit kies je zelf
     */
    $all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    
    <!-- /**
    * Hier loop (iterate) je over alle waardes die gevonden zijn.
    * Je kunt zoals je zien paragraaf-tags gebruiken
    * maar je kunt ook andere HTML-**tags** gebruiken
    */ -->
    <table>
        <thead>
            <th>user_id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>address</th>
            <th>city</th>
            <th>role</th>
            <th><a href="nieuw-gebruiker.php">nieuwe gebruiker</a></th>
            <th><a href="tool-overzicht.php">product overzicht</a></th>
        </thead>
        <?php foreach($all_users as $user): ?>
        <tbody>
            <td><?php echo $user["id"] ?></td>
            <td><?php echo $user["firstname"] ?></td>
            <td><?php echo $user["lastname"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo $user["address"] ?></td>
            <td><?php echo $user["city"] ?></td>
            <td><?php echo $user["role"] ?></td>
            <td><a href="users-detail.php?id=<?php echo $user['id']?>">verdere info</a></td>
        </tbody>
        <?php endforeach; ?>

    </table>


    
</body>
</html>