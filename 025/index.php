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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['_method'] == 'post') {

        // INSERT INTO table_name (column1, column2, column3, ...)
        // VALUES (value1, value2, value3, ...);

        $sql = "
            INSERT INTO trees
            (name, height, type)
            VALUES (?, ?, ?)
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['height'],
            $_POST['type']
        ]);
        header('Location: http://localhost/ciupakabros/025/');
        die;

    }
    if ($_POST['_method'] == 'delete') {

        // DELETE FROM table_name WHERE condition;

        $sql = "
            DELETE
            FROM trees
            WHERE id = ?
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$_POST['id']]);

        header('Location: http://localhost/ciupakabros/025/');
        die;

    }
    if ($_POST['_method'] == 'put') {
        // UPDATE table_name
        // SET column1 = value1, column2 = value2, ...
        // WHERE condition;

    $sql = "
        UPDATE trees
        SET name = ?, height = ?, type = ?
        WHERE id = ?
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['name'],
        $_POST['height'],
        $_POST['type'],
        $_POST['id']
    ]);
    header('Location: http://localhost/ciupakabros/025/');
    die;


    }

    if ($_POST['_method'] == 'up') {
        // UPDATE table_name
        // SET column1 = value1, column2 = value2, ...
        // WHERE condition;

    $sql = "
        UPDATE trees
        SET height = height + 1
        WHERE 1
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([]);
    header('Location: http://localhost/ciupakabros/025/');
    die;


    }



}


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

$sql = "
    SELECT sum(height) AS heights
    FROM trees
";

$stmt = $pdo->query($sql);

$sum = $stmt->fetch();


?>
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

    <ul>
        <?php foreach($trees as $tree) : ?>
        <li>
            <div class="id"><?= $tree['id'] ?></div>
            <div class="name"><?= $tree['name'] ?></div>
            <div class="h"><?= $tree['height'] ?> m</div>
            <div class="t"><?= ['Lapuotis', 'Spygliuotis', 'Palmė'][$tree['type'] - 1] ?></div>
        </li>
        <?php endforeach ?>
        <li>
            <div class="id"></div>
            <div class="name">Bendras aukštis</div>
            <div class="h"><?= $sum['heights'] ?> m</div>
            <div class="t"></div>
        </li>
    </ul>
    <form method="post">
        <input type="hidden" name="_method" value="up">
        <div><button type="submit">Lietus</div>
    </form>

    <div class="bin">
        <form method="post">
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
            <input type="hidden" name="_method" value="post">
            <div><button type="submit">Sodinti</div>
        </form>

        <form method="post">
            <div>
                <label>ID</label>
                <input type="text" name="id">
            </div>
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
            <input type="hidden" name="_method" value="put">
            <div><button type="submit">Persodinti</div>
        </form>

        <form method="post">
            <div>
                <label>ID</label>
                <input type="text" name="id">
            </div>

            <input type="hidden" name="_method" value="delete">
            <div><button type="submit">Pjauti</div>
        </form>

    </div>


</body>

</html>