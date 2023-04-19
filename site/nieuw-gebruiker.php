<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- action en method zijn atributen -->
    <form action="verwerk-nieuw-gebruiker.php" method="post">
        <h1>Maak een nieuwe gebruiker aan</h1>
        <div class="form-group">
            <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" id="voornaam">
        </div>
        <div class="form-group">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="achternaam" id="achternaam">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="wachtword">Wachtword</label>
            <input type="password" name="wachtword" id="wachtword">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address">
        </div>
        <div class="form-group">
            <label for="stad">Stad</label>
            <input type="text" name="stad" id="stad">
        </div>
        <div class="form-group">
            <input type="radio" id="role1" name="role" value="administrator">
            <label for="role1">Administrator</label>
        </div>
        <div class="form-group">
            <input type="radio" id="role2" name="role" value="employee">
            <label for="role2">Employee</label>
        </div>
        <div class="form-group">
            <input type="radio" id="role3" name="role" value="customer">
            <label for="role3">Customer</label>
        </div>
        <button type="sumbit">Maak nieuwe gebruiker</button>
    </form>

</body>

</html>