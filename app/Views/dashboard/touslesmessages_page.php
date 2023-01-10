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
    
    echo $countMessages;
    
    foreach ($messages as $message) : ?>


    <h1>Messages: </h1>
    <?= esc($message["remark"]); ?> <br>
    <?= esc($message["id"]); ?> <br>
    <?= esc($message["satisfaction"]); ?> <br>
    <?= esc($message["email"]); ?> <br>
    <?= esc($message["name"]); ?> <br> 

    <h2>Fin message</h2>
    <?php endforeach ?>
</body>
</html>