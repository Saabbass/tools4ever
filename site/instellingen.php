<?php
session_start();
require "database.php";
if (!isset($_SESSION['isIngelogd'])) {
    header("location: inloggen.php");
    exit;
}

// is de grbuiker een administrator
if ($_SESSION['role'] != "administrator") {
    header("location: store.php");
    exit;
}

$userid = $_SESSION['id'];
$sql = "SELECT * FROM users INNER JOIN user_settings ON user_settings.user_id = users.id;";

$result = mysqli_query($conn, $sql);

$employee= mysqli_fetch_assoc($result);
?>


<section class="second_section">
    <table>
        <thead>
            <th>id</th>
            <th>background color</th>
            <th>theme</th>
        </thead>
            <tbody>
                <td><?php echo $employee['user_id']; ?></td>
                <td><?php echo $employee['backgroundColor']; ?></td>
                <td><?php echo $employee['theme']; ?></td>
            </tbody>    
    </table>
</section>