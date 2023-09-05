<?php
$_TEMPLATE_PUBLIC_PATH = './src/templates/public.pages/';
$radapter = new RAdapter($router, $_TEMPLATE_PUBLIC_PATH, $_ENV['HTTP_DOMAIN']);

//  TEST
// $radapter->getHTML('/test', 'test',);

// HOME
// $radapter->getHTML('/', 'home', function ($DATA) {
//     return [
//         // 'info' => (new InfoDao($DATA['mysqlAdapter']))->select(),
//     ];
// });
