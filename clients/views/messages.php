<?php
use App\Services\Messages;

if (!Messages::msg()->hasToShow()) return;

?>

<div class="msg-container">
    <div class="msg-bin">
        <?php foreach(Messages::msg()->getMessages() as $msg) : ?>

        <div class="m-2 alert alert-<?= $msg['type'] ?>" role="alert">
            <?= $msg['text'] ?>
        </div>

        <?php endforeach ?>
    </div>
</div>