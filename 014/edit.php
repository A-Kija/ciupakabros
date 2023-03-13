<?php

// POST scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $id = (int) $_GET['id'];
    $users = unserialize(file_get_contents(__DIR__ . '/users.ser'));

    // tikrinam
    foreach($users as $user) {
        if ($user['place_in_row'] == (int) $_POST['place_in_row']) {
            $_SESSION['msg'] = ['type' => 'error', 'text' => 'Row is invalid'];
            header('Location: http://localhost/ciupakabros/014/edit.php?id='.$id);
            die;
        }
    }


    foreach($users as &$user) {
        if ($user['user_id'] == $id) {
            
            $user['name'] = $_POST['name'];
            $user['surname'] = $_POST['surname'];
            $user['place_in_row'] = (int) $_POST['place_in_row'];

            $users = serialize($users);
            file_put_contents(__DIR__ . '/users.ser', $users);

            break;
        }
    }

    $_SESSION['msg'] = ['type' => 'ok', 'text' => 'User was edited'];
    header('Location: http://localhost/ciupakabros/014/users.php?sort=id_desc');
    die;
}

//GET scenarijus

$users = unserialize(file_get_contents(__DIR__ . '/users.ser'));

$id = (int) $_GET['id'];

$find = false;
foreach($users as $user) {
    if ($user['user_id'] == $id) {
        $find = true;
        break;
    }
}

if (!$find) {
    die('User not found');
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <?php require __DIR__ . '/menu.php' ?>
    
    <form action="?id=<?= $user['user_id'] ?>" method="post">
        <fieldset>
            <legend>EDIT:</legend>
            <label>name: </label>
            <input type="text" name="name" value="<?= $user['name'] ?>">
            <label>surname: </label>
            <input type="text" name="surname" value="<?= $user['surname'] ?>">
            <label>row: </label>
            <input type="text" name="place_in_row"  value="<?= $user['place_in_row'] ?>">
            <button type="submit">save</button>
        </fieldset>

    </form>


</body>

</html>