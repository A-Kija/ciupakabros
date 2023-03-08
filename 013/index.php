<?php

// POST scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // kazka padarom

    echo '<pre>';
    print_r($_POST);
    die;

    header('Location: http://localhost/ciupakabros/013/');
    die;

}

// GET scenarijus


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
    <h1>013</h1>
    <form action="" method="post">
        <input type="text" name="animal">
        <br>
        <input type="range" min="0" max="10" value="0" name="magic_number">
        <br>
        <button type="submit">GO</button>
    </form>
</body>

</html>