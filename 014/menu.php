<?php 
    $users_ = unserialize(file_get_contents(__DIR__ . '/users.ser'));
    $all = ceil(count($users_) / 10);
?>

<?php foreach (range(1, $all) as $page) : ?>
   
    <a href="http://localhost/ciupakabros/014/users.php?page=<?= $page ?>&sort=<?= $sort ?? '' ?>">PAGE <?= $page ?></a>

<?php endforeach ?>

<a href="http://localhost/ciupakabros/014/create.php">Add New</a>