<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Client</h1>
                </div>
                <div class="card-body">
                    <div class="client-line">
                        <div class="client-info">
                            <?= $client['name'] ?>
                            <?= $client['surname'] ?>
                            <span><?= $client['tt'] ? 'TIK TOK' : 'FB' ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>