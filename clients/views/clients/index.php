<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Clients List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($clients as $client) : ?>
                        <li class="list-group-item">
                            <div class="client-line">
                                <div class="client-info">
                                    <?= $client['name'] ?>
                                    <?= $client['surname'] ?>
                                    <span><?= $client['tt'] ? 'TIK TOK' : 'FB' ?></span>
                                </div>
                                <div class="buttons">
                                    <a href="<?= URL ?>clients/show/<?= $client['id'] ?>" class="btn btn-info">Show</a>
                                    <a href="<?= URL ?>clients/edit/<?= $client['id'] ?>" class="btn btn-success">Edit</a>
                                    <form action="<?= URL ?>clients/delete/<?= $client['id'] ?>" method="post">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>