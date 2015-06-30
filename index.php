<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/16
 * Time: 11:34
 */
use Baymax\App;
use Slim\Middleware\SessionCookie;

error_reporting(E_ALL);

//程序实际目录
define('BASE_ROOT', __DIR__);
//路由目录
define('ROUTE_DIR', __DIR__ . '/app/route/');

require './vendor/autoload.php';

$config = require './app/config/config.php';

$app = new \Slim\Slim($config);

$app->add(new SessionCookie($app->config('session')));

$app->notFound(function () {
    var_dump('没有找到');
});

App::registerRoute('home',$app);

$app->run();