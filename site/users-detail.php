<?php
session_start();
require 'database.php';

$toolId = $_GET['id'];

$sql = "SELECT * FROM tools WHERE tool_id = $toolId";

$result = mysqli_query($conn, $sql);

if (!is_object($result)) {
    header("location: productInfo.php");
    exit;
}

if (mysqli_num_rows($result) <= 0) {
    echo "This product doens't exist!!";
    exit;
}

$tool = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
</head>

<body>

    <div>
        <table>
            <thead>
                <th>tool_id</th>
                <th>tool_name</th>
                <th>tool_category</th>
                <th>tool_price</th>
                <th>tool_brand</th>
            </thead>
            <tbody>
                <td><?php echo $tool["tool_id"] ?></td>
                <td><?php echo $tool["tool_name"] ?></td>
                <td><?php echo $tool["tool_category"] ?></td>
                <td>&euro; <?php echo $tool["tool_price"] ?></td>
                <td><?php echo $tool["tool_brand"] ?></td>
            </tbody>

        </table>
    </div>
</body>

</html>