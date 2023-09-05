<div class="sidebar">
    <img class="img-bg" src="<?= $DATA['http_domain'] ?>public/img/sidebar.jpg" alt="Image of background of sidebar">
    <button class="burguer-button" onclick="handleBurgerSidebar()">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="sidebar-header">
        <h4 class="text-truncate p-2"><?= $_ENV['HTML_TITLE'] ?></h4>
    </div>
    <div class="logo">
        <img src="<?= $DATA['http_domain'] ?>public/img/logo.png" alt="Logo" class="logo">
    </div>
    <!-- List | ini -->
    <ul class="list-group rounded-0 p-2 border-0">

        <a href="<?= $DATA['http_domain'] ?>" class="nav-option btn btn-outline-primary border-0 text-start p-3 mb-2 <?= ($DATA['name'] == "home") ? "shadow  active" : "" ?>">
            <i class="fa-solid fa-house"></i>
            <span class="ms-2">Home</span>
        </a>

        <?php if ($_SESSION['user_admin']) { ?>
            <a href="<?= $DATA['http_domain'] ?>users" class="nav-option btn btn-outline-primary border-0 text-start p-3 mb-2 <?= ($DATA['name'] == "users") ? "shadow  active" : "" ?>">
                <i class="fa-solid fa-users"></i>
                <span class="ms-2">Users</span>
            </a>
        <?php } ?>

        <a href="<?= $DATA['http_domain'] ?>tasks" class="nav-option btn btn-outline-primary border-0 text-start p-3 mb-2 <?= ($DATA['name'] == "tasks") ? "shadow  active" : "" ?>">
            <i class="fa-solid fa-tasks"></i>
            <span class="ms-2">Tasks</span>
        </a>

    </ul>
    <!-- List | end -->
</div>