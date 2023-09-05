<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('./src/templates/panel.component/head.php') ?>
</head>

<body>
    <?php include('./src/templates/panel.component/header.php') ?>
    <?php include('./src/templates/panel.component/sidebar.php') ?>
    <main>
        <!-- CONTENT PAGE | INI -->
        <div class=" pt-4 px-md-5 px-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $DATA['http_domain'] ?>panel">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Users</b>
                        <button class="btn btn-outline-success" onclick="handleFunction.new()">
                            <i class="fa-solid fa-plus"></i>
                            <span>Create new</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover border">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th class="d-none d-md-table-cell" scope="col">#</th>
                                <th class="text-center text-md-left" scope="col">Photo</th>
                                <th class="text-center text-md-left" scope="col">Name</th>
                                <th class="d-none d-md-table-cell text-center text-md-left" scope="col">User</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="element-table"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- CONTENT PAGE | END -->

        <!-- MODAL | INI -->
        <!-- gift | ini -->

        <!-- gift | end -->

        <!-- form | ini -->
        <div class="modal fade" id="element-modalform" tabindex="-1" aria-labelledby="element-modalformLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content needs-validation" id="element-form" onsubmit="return false" novalidate>
                    <input type="hidden" name="user_id" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="element-modalformLabel">User Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- form | ini -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="validationServer01" class="form-label">Name</label>
                                <input type="text" class="form-control" id="validationServer01" placeholder="Name.." name="user_name" required>
                                <div class="invalid-feedback">
                                    Write a name!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer05" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="validationServer05" placeholder="Phone.." name="user_whatsapp" required>
                                <div class="invalid-feedback">
                                    Write a whatsapp number!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationServer05" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="validationServer05" name="user_photo">
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer03" class="form-label">Username</label>
                                <input type="text" class="form-control" id="validationServer03" placeholder="Username.." name="user_user" required>
                                <div class="invalid-feedback">
                                    Write a username!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer04" class="form-label">Password</label>
                                <input type="text" class="form-control" id="validationServer04" placeholder="********" name="user_pass" required>
                                <div class="invalid-feedback">
                                    Write a password!
                                </div>
                            </div>



                        </div>
                        <!-- form | end -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- form | end -->

        <!-- confirm | ini -->
        <div class="modal fade" id="element-modalconfirm" tabindex="-1" aria-labelledby="element-modalconfirmLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="element-modalconfirmLabel">Eliminar registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estas seguro de eliminar este registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="crudFunction.delete()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- confirm | end -->
        <!-- MODAL | END -->
    </main>
</body>
<foot>
    <?php include('./src/templates/panel.component/foot.php') ?>
    <script src="<?= $DATA['http_domain'] ?>public/js.panel/users.js"></script>
</foot>

</html>