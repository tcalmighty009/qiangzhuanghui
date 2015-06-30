<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/30
 * Time: 14:47
 */

namespace Baymax\Controller;


use Baymax\App;
use ValidateCode;

class ImgController extends App {

    /**
     * 输出验证码
     */
    public function code() {
        $val = new ValidateCode();
        $this->app->response->headers->set('Content-Type', 'image/jpeg');
        $val->doimg();
    }

}