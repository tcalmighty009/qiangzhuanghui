<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/18
 * Time: 16:15
 */

use Baymax\App;
use Baymax\Controller\UserController;

//用户信息
$app->get('/info', function () use ($app) {
    $userController = new UserController($app);
    $userController->userInfo();
});

//当用户已注册业务时跳转到用户业务页
$getIdentity = function () use ($app) {
    if (App::getSession('business')) {
        $app->redirect('/user/business');
    }
};

//当用户未注册业务时跳转到业务注册页
$regIdentity = function () use ($app) {
    if (!App::getSession('business')) {
        $app->redirect('/user/regBusiness');
    }
};

//用户业务
$app->get('/business', $regIdentity, function () use ($app) {
    $userController = new UserController($app);
    $userController->userBusiness();
});

//用户业务注册
$app->map('/regBusiness', $getIdentity, function () use ($app) {
    $userController = new UserController($app);
    $userController->regBusiness();
})->via('GET', 'POST');