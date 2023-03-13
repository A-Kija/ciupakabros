<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $users = unserialize(file_get_contents(__DIR__ . '/users.ser'));

    // tikrinam
    foreach($users as $user) {
        if ($user['place_in_row'] == (int) $_POST['place_in_row']) {
            $_SESSION['msg'] = ['type' => 'error', 'text' => 'Row is invalid'];
            header('Location: http://localhost/ciupakabros/014/create.php');
            die;
        }
    }

    $id = json_decode(file_get_contents(__DIR__ . '/id.json'));
    $id++;
    file_put_contents(__DIR__ . '/id.json', json_encode($id));

    $user = [
        'user_id' => $id,
        'place_in_row' => (int) $_POST['place_in_row'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
    ];

    

    $users[] = $user;

    $users = serialize($users);
    file_put_contents(__DIR__ . '/users.ser', $users);

    $_SESSION['msg'] = ['type' => 'ok', 'text' => 'New user was created'];
    header('Location: http://localhost/ciupakabros/014/users.php?sort=id_desc');
    die;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <?php require __DIR__ . '/menu.php' ?>
    
    <form action="" method="post">
        <fieldset>
            <legend>ADD NEW:</legend>
            <label>name: </label>
            <input type="text" name="name">
            <label>surname: </label>
            <input type="text" name="surname">
            <label>row: </label>
            <input type="text" name="place_in_row">
            <button type="submit">ADD</button>
        </fieldset>

    </form>


</body>

</html>