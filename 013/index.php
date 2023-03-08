<?php
session_start();
// setcookie('animal', 'RACOON', time() - 3600 * 10);

// POST scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // kazka padarom

    $_SESSION['animal']  = $_POST['animal'];
    $_SESSION['magic_number'] = $_POST['magic_number'];

    header('Location: http://localhost/ciupakabros/013/');
    die;

}

// GET scenarijus

$animal = $_SESSION['animal'] ?? '';
$mn = $_SESSION['magic_number'] ?? '';
unset($_SESSION['animal'], $_SESSION['magic_number']);
//animal|s:7:"voverė";magic_number|s:1:"8";
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
    <h2><?= $animal ?> <?= $mn ?></h2>
    <form action="" method="post">
        <input type="text" name="animal">
        <br>
        <input type="range" min="0" max="10" value="0" name="magic_number">
        <br>
        <button type="submit">GO</button>
    </form>
</body>

</html>