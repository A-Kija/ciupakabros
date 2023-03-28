<?php
$users = [
    ['name' => 'briedis@gmail.com', 'psw' => md5('123')],
    ['name' => 'bebras@gmail.com', 'psw' => md5('123')],
    ['name' => 'simona@gmail.com', 'psw' => md5('123')]
];

file_put_contents(__DIR__ .'/users.json', json_encode($users));

echo 'All is OK';
