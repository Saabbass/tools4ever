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
    <form action="submit" method="post">
        <h1>Maak een nieuw product aan</h1>

        
        <div class="form-group">
            <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
        <label for="naamProduct">Naam product</label>
        <input type="text" name="" id="naamProduct">
        </div>
        <div class="form-group">
        <label for="categoryProduct">Category product</label>
        <input type="text" name="" id="categoryProduct">
        </div>
        <div class="form-group">
        <label for="prijsProduct">Prijs product</label>
        <input type="text" name="" id="prijsProduct">
        </div>
        <div class="form-group">
        <label for="merkProduct">Merk product</label>
        <input type="text" name="" id="merkProduct">
        </div>

        

        

       

        
        <button type="submit">Verzend</button>
    </form>
    
</body>
</html>