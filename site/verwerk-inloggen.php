<?php

    require 'database.php';

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    // $email = $_POST['email'];
    // $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);

    if(!is_array($user)){
        echo "Deze gebruiker is bij ons onbekend!";
        exit;
    }

    if($_POST['password'] !== $user["password"]){
        echo 'Deze gebruiker is onbekend of heeft een onjuist wachtword opgegeven';
        exit;
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Welkom <?php echo $user['firstname']; ?>
    </h1>
</body>
</html>