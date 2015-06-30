<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/16
 * Time: 16:10
 */

use Baymax\Controller\CommonController;

$app->map('/regOne', function () use ($app) {
    $common = new CommonController($app);
    $common->regOne();
})->via('GET', 'POST');

$app->map('/regTo', function () use ($app) {
    $common = new CommonController($app);
    $common->regTo();
})->via('GET', 'POST');