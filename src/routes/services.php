<?php
$_TEMPLATE_SERVICES_PATH = './src/services/';
$radapter = new RAdapter($router, $_TEMPLATE_SERVICES_PATH, $_ENV['HTTP_DOMAIN']);

// CONFIGURATION
$radapter->getHTML('/api/config', 'configuration');

// USER
$radapter->post('/api/user/login', fn (...$args) => UserService::login(...$args));
$radapter->post('/api/user/logout', fn () => UserService::logout());
// need to be logged
$radapter->post('/api/user/select', fn () => middlewareSessionServicesLogin(), fn (...$args) => UserService::select(...$args));
$radapter->post('/api/user/insert', fn () => middlewareSessionServicesLogin(), fn (...$args) => UserService::insert(...$args));
$radapter->post('/api/user/update', fn () => middlewareSessionServicesLogin(), fn (...$args) => UserService::update(...$args));
$radapter->post('/api/user/delete', fn () => middlewareSessionServicesLogin(), fn (...$args) => UserService::delete(...$args));

// TASK
$radapter->post('/api/task/select', fn (...$args) => TaskService::select(...$args));
$radapter->post('/api/task/insert', fn () => middlewareSessionServicesLogin(), fn (...$args) => TaskService::insert(...$args));
$radapter->post('/api/task/update', fn () => middlewareSessionServicesLogin(), fn (...$args) => TaskService::update(...$args));
$radapter->post('/api/task/update_status', fn () => middlewareSessionServicesLogin(), fn (...$args) => TaskService::updateStatus(...$args));
$radapter->post('/api/task/delete', fn () => middlewareSessionServicesLogin(), fn (...$args) => TaskService::delete(...$args));
