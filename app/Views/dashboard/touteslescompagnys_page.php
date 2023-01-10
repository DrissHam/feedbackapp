<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    foreach ($compagnys as $compagny) : ?>

    
    

    <h1>Compagny/Partenaire: </h1>
    <?= esc($compagny["compagny_name"]); ?> <br>
    <?= esc($compagny["id"]); ?> <br>
    <?= esc($compagny["address"]); ?> <br>
    <?= esc($compagny["postal_code"]); ?> <br>
    <?= esc($compagny["password"]); ?> <br> 

    <h2>Fin information compagny</h2>
    <?php endforeach ?>
</body>
</html>