<style>
    h3, form {
        display: inline-block;
        margin-left: 20px;
    }
    button {
        background: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }

</style>
<?php
defined('ENTER') || die('no entry here');
?>
<h2 style="color:darkgreen;">MENU</h2>
<a href="http://localhost/ciupakabros/015/">HOME</a>
<a href="http://localhost/ciupakabros/015/forest/">DARK FOREST</a>

<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) : ?>
<h3><?= $_SESSION['name'] ?></h3>
<form action="http://localhost/ciupakabros/015/login/?logout" method="post">
    <button type="submit">LOG OUT</button>
</form>
<?php else : ?>
<a href="http://localhost/ciupakabros/015/login/">LOGIN</a>
<?php endif ?>
