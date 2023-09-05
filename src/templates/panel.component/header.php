<nav class="header navbar navbar-expand navbar-dark p-0 bg-primary">
    <div class="container-fluid">
        <!-- Options | ini -->
        <ul class="navbar-nav mb-0 mb-lg-0 ms-auto">
            <li class="li-togle-dark">
                <button class="btn-darkmode" id="theme-toggle">
                    <i class="dark fas fa-moon"></i>
                    <i class="light fas fa-sun"></i>
                </button>
            </li>
            <li class="nav-item dropdown">
                <a class="header-user-btn nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="header-user-photo rounded-circle" src="<?= $_SESSION['user_photo_url'] ?>" alt="User photo">
                    <span><?= $_SESSION['user_name'] ?></span>
                </a>
                <ul class="header-dropdown-menu dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <div class="p-relative">
                        <img class="img-bg" src="<?= $DATA['http_domain'] ?>public/img/sidebar.jpg" alt="Image of background of sidebar">
                        <li class="text-center">
                            <img class="dropdown-user-photo rounded-circle" src="<?= $_SESSION['user_photo_url'] ?>" alt="User photo">
                            <br><br>
                            <span class="text-primary"><?= $_SESSION['user_name'] ?></span>
                            <br><br>
                        </li>
                        <!-- <li><a class="btn btn-outline-primary p-1 mb-1" style="width:100%" href="#">Perfil</a></li> -->
                        <li><button class="btn btn-outline-primary p-1 mb-1" style="width:100%" onclick="logout()">Cerrar sesion</button></li>
                    </div>
                </ul>
            </li>
        </ul>
        <!-- Options | end -->
    </div>
</nav>