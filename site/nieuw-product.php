<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Product</title>
</head>
<body>
    <!-- action en method zijn atributen -->
    <form action="submit" method="post">
        <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
        <label for="naamProduct">Naam product</label>
        <input type="text" name="" id="naamProduct">

        <label for="categoryProduct">Category product</label>
        <input type="text" name="" id="categoryProduct">

        <label for="prijsProduct">Prijs product</label>
        <input type="text" name="" id="prijsProduct">
        
        <label for="merkProduct">Merk product</label>
        <input type="text" name="" id="merkProduct">
        <button type="submit">Verzend</button>
    </form>
    
</body>
</html>