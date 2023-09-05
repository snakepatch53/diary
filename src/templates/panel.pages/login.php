<!DOCTYPE html>
<html lang="<?= $_ENV['HTML_LANG'] ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/library.general/animate.min.css">
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/library.general/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.general/config.css">
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.general/theme1.css">
    <link rel="stylesheet" href="<?= $DATA['http_domain'] ?>public/css.panel/login.css">
    <link rel="shortcut icon" href="<?= $DATA['http_domain'] ?>public/img/icon.png" type="image/x-icon">
    <title><?= $_ENV['HTML_TITLE'] ?> ⚙️ Login</title>
    <script>
        const http_domain = '<?= $DATA['http_domain'] ?>';
    </script>
</head>

<body class="loading">
    <div class="load">
        <i class="fas fa-spinner fa-spin"></i>
    </div>
    <img src="<?= $DATA['http_domain'] ?>public/img/login-background.jpg" alt="Image of background" class="bg" id="imgrain">
    <main class='container-fluid'>
        <div class="modal">
            <div class="container">
                <form id="element-loginform" onsubmit="return false">
                    <a href="<?= $DATA['http_domain'] ?>" class="logo">
                        <img class="logo" src="<?= $DATA['http_domain'] ?>public/img/logo.png" alt="Logo">
                        <h1><?= $_ENV['HTML_TITLE'] ?></h1>
                    </a>
                    <div class="input">
                        <label for="validationCustom01">Username</label>
                        <div class="row">
                            <div class="icon"><i class="fa fa-user"></i></div>
                            <input class="form-control" id="validationCustom01" name="user_user" placeholder="Insert your user" type="text">
                        </div>
                    </div>
                    <div class="input">
                        <label for="validationCustom02">Password</label>
                        <div class="row">
                            <div class="icon"><i class="fa fa-lock"></i></div>
                            <input class="form-control" id="validationCustom02" name="user_pass" placeholder="Insert your pass" type="password">
                            <div class="icon right" id="togglePassword">
                                <i class="show fa fa-eye"></i>
                                <i class='hide fa fa-eye-slash'></i>
                            </div>
                        </div>
                    </div>
                    <div class="input message" id="element-msg-login"></div>
                    <div class="input">
                        <button type="submit">
                            <span class="me-1">Log In</span>
                            <i class="fas fa-sign-in-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<foot>
    <script src="<?= $DATA['http_domain'] ?>public/js.general/fetch.js"></script>
    <script src="<?= $DATA['http_domain'] ?>public/library.general/rainyday.min.js"></script>
    <script src="<?= $DATA['http_domain'] ?>public/js.panel/login.js"></script>
</foot>

</html>