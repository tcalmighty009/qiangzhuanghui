<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/30
 * Time: 16:52
 */

use Baymax\Controller\ImgController;

require './vendor/autoload.php';

$config = require './app/config/config.php';
$app = new \Slim\Slim($config);

header('Content-Type', 'image/jpeg');

(new ImgController($app))->code();