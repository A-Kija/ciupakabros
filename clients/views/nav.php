<?php
use App\Services\Auth;
?>
<?php if (isset($hideNav)) return ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>">CMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>clients">Clients List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>clients/create">Add Client</a>
                </li>
            </ul>
            <span class="navbar-text">
            <?php if (Auth::get()->isAuth()) : ?>
                <span><?= Auth::get()->getName() ?></span>
                <form class="logout" action="<?= URL ?>logout" method="post">
                    <button type="submit">logout</button>
                </form>
            <?php else : ?>
                <a class="nav-link" href="<?= URL ?>login">login</a>
            <?php endif ?>
            </span>
        </div>
    </div>
</nav>