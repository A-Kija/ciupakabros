<?php define('ENTER', true) ?>
<?php session_start() ?>
<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] != 1) {
    header('Location: http://localhost/ciupakabros/015/login/');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forest for Members</title>
</head>
<body>
    <?php require __DIR__ . '/../menu.php' ?>
    <h1 style="color: crimson;">Welcome to the DARK and DEEP FOREST</h1>
</body>
</html>