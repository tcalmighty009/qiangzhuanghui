<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/16
 * Time: 14:38
 */

use Baymax\App;
use Baymax\Controller\CommonController;
use Baymax\Controller\HomeController;
use Baymax\Controller\ImgController;
use Baymax\Controller\UserController;

$app->get('/', function () use ($app) {
    $app = new HomeController($app);
    $app->index();
});

//当用户已登陆则跳转到用户信息
$isLogin = function () use ($app) {
    if (App::getSession('login')) {
        $app->redirect('/user/info');
    }
};

//当用户未登陆是跳转到登陆页
$userLogin = function () use ($app) {
    if (!App::getSession('login')) {
        $app->redirect('/user/login');
    }
};

$app->get('/install/user', function () use ($app) {
    $common = new CommonController($app);
    $common->install();
});

//用户公共组
$app->group('/common', $isLogin, function () use ($app) {
    App::registerRoute('home/common', $app);
});

//用户登陆
$app->map('/user/login', $isLogin, function () use ($app) {
    $userController = new UserController($app);
    $userController->userLogin();
})->via('GET', 'POST');

//用户信息组
$app->group('/user', $userLogin, function () use ($app) {
    App::registerRoute('home/user', $app);
});

$app->post('/upload', function () use ($app) {
    $up = new FileUpload();
    if ($up->upload('file')) {
        echo '<pre>';
        //获取上传后文件名子
        var_dump($up->getFileName());
        echo '</pre>';
    } else {
        echo '<pre>';
        //获取上传失败以后的错误提示
        var_dump($up->getErrorMsg());
        echo '</pre>';
    }
});

$app->get('/img', function () use ($app) {
    (new ImgController($app))->code();
});