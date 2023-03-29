<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TREES</title>
</head>
<body>
    


<?php

$host = '127.0.0.1';
$db   = 'cs1';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT column1, column2, ...
// FROM table_name;

// $sql = "
//     SELECT id, name, height, type
//     FROM trees
//     WHERE height > 6
//     ORDER BY type desc, height
//     LIMIT 2, 1
// ";

$sql = "
    SELECT id, name, height, type
    FROM trees
    ORDER BY name
";

$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();

?>
<div class="bin">
<ul>
    <?php foreach($trees as $tree) : ?>
        <li>
            <div class="id"><?= $tree['id'] ?></div>
            <div class="name"><?= $tree['name'] ?></div>
            <div class="h"><?= $tree['height'] ?> m</div>
            <div class="t"><?= ['Lapuotis', 'Spygliuotis', 'Palmė'][$tree['type'] - 1] ?></div>
        </li>
    <?php endforeach ?>
</ul>

<form>
    <div>
    <label>Vardas</label>
        <input type="text" name="name">
    </div>
    <div>
    <label>Aukštis</label>
        <input type="range" name="height">
    </div>
    <div>
    <label>Tipas</label>
        <select name="type">
            <option value="1">Lapuotis</option>
            <option value="2">Spygliuotis</option>
            <option value="3">Palmė</option>
        </select>
    </div>

</form>

</div>


</body>
</html>