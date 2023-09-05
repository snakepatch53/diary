<?php
$_TEMPLATE_PANEL_PATH = './src/templates/panel.pages/';
$radapter = new RAdapter($router, $_TEMPLATE_PANEL_PATH, $_ENV['HTTP_DOMAIN']);

$radapter->getHTML('/login', 'login', fn () => middlewareSessionLogout());

$radapter->getHTML('/index.php', 'home', fn () => middlewareSessionLogin(), function ($DATA) {

    return [
        'users_count' => count((new UserDao($DATA['mysqlAdapter']))->select()),
        'tasks_count' => count((new TaskDao($DATA['mysqlAdapter']))->select()),
        'tasks_count_complete' => (new TaskDao($DATA['mysqlAdapter']))->countStatusComplete(),
        'tasks_count_missing' => (new TaskDao($DATA['mysqlAdapter']))->countStatusMissing()
    ];
});

$radapter->getHTML('/', 'home', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'users_count' => count((new UserDao($DATA['mysqlAdapter']))->select()),
        'tasks_count' => count((new TaskDao($DATA['mysqlAdapter']))->select()),
        'tasks_count_complete' => (new TaskDao($DATA['mysqlAdapter']))->countStatusComplete(),
        'tasks_count_missing' => (new TaskDao($DATA['mysqlAdapter']))->countStatusMissing()
    ];
});


$radapter->getHTML('/home', 'home', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        'users_count' => count((new UserDao($DATA['mysqlAdapter']))->select()),
        'tasks_count' => count((new TaskDao($DATA['mysqlAdapter']))->select()),
        'tasks_count_complete' => (new TaskDao($DATA['mysqlAdapter']))->countStatusComplete(),
        'tasks_count_missing' => (new TaskDao($DATA['mysqlAdapter']))->countStatusMissing()
    ];
});


$radapter->getHTML('/users', 'users', fn () => middlewareSessionTipoUser_login(), function ($DATA) {
    return [
        // 'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});


$radapter->getHTML('/tasks', 'tasks', fn () => middlewareSessionLogin(), function ($DATA) {
    return [
        // 'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
    ];
});
