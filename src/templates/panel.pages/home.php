<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('./src/templates/panel.component/head.php') ?>
    <style>
        /* Estilos para el dashboard */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 1px 6px 0 rgba(0, 0, 0, 0.5);
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 0px 0px 10px 10px;
            text-align: center;
            cursor: pointer;
        }

        .card-footer i {
            margin-right: 5px;
        }

        main {
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php include('./src/templates/panel.component/header.php') ?>
    <?php include('./src/templates/panel.component/sidebar.php') ?>
    <main>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-primary text-white" style="background: #2f7cee !important">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Users</span>
                                <i class="fa-solid fa-users"></i>
                            </h5>
                            <p class="card-text">Total users: <?= $DATA['users_count'] ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>users">See users</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-success text-white" style="background: #00e389 !important">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Total Tasks</span>
                                <i class="fa-solid fa-users"></i>
                            </h5>
                            <p class="card-text">Total tasks: <?= $DATA['tasks_count'] ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>tasks">See tasks</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-primary text-white" style="background: #374d99 !important">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Tasks Complete</span>
                                <i class="fa-solid fa-users"></i>
                            </h5>
                            <p class="card-text">Total tasks complete: <?= $DATA['tasks_count_complete'] ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>tasks">See tasks</a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mb-3">
                    <div class="card bg-primary text-white" style="background: #d03a2e !important">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between">
                                <span>Tasks Missing</span>
                                <i class="fa-solid fa-users"></i>
                            </h5>
                            <p class="card-text">Total tasks missing: <?= $DATA['tasks_count_missing'] ?></p>
                        </div>
                        <a class="card-footer btn" href="<?= $DATA['http_domain'] ?>tasks">See tasks</a>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
<foot>
    <?php include('./src/templates/panel.component/foot.php') ?>
</foot>

</html>