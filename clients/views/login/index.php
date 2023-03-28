<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h2>CMS Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= URL ?>login" method="post">
                            <div class="mb-3">
                                <label class="form-label">User name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User password</label>
                                <input type="password" class="form-control" name="psw">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>