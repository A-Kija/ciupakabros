<?php

$color = $_GET['color'] ?? '0d0d0d';

$color = str_replace('#', '', $color);



// validacija
if (!preg_match('/^[\da-f]{6}$/', $color)) {
    $color = 'ff0000';
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

<body style="background: #<?= $color ?>;">
    <form action="" method="get">
        <input type="color" name="color">
        <button type="submit">GO</button>
    </form>

</body>

</html>