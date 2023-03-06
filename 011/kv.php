<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=http://localhost/ciupakabros/011/kv.php">
    <title>Kvadratas</title>
    <style>
        span {
            line-height: 1;
            padding: 0 3px;
        }
    </style>
</head>
<body>
    <?php foreach (range(1, 10) as $_) : ?>
        <div>
        <?php foreach (range(1, 10) as $_) : ?>

            <span style="color:rgb(<?= rand(0, 255) ?>,<?= rand(0, 255) ?>,<?= rand(0, 255) ?>);">*</span>

        <?php endforeach ?>
        </div>
    <?php endforeach ?>
    
</body>
</html>