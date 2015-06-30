<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/18
 * Time: 8:34
 */

namespace Baymax\Form;


use Baymax\App;

class CommonForm extends App {

    public function validationRegOne() {
        $pattern = '/^[1][3587]\d{9}$/';
        return preg_match($pattern, $this->request->post('phone'));
    }

    public function validationRegTo() {
        $validation = array();
        $regExp = array(
            'name' => '/^[a-zA-z][a-zA-Z0-9_]{5,14}$/',
            'password' => '/^[a-zA-Z0-9_]{6,20}$/'
        );
        if ($this->getSession('code') == $this->request->post('code')) {
            $validation = $this->regExpValidation($regExp);
        } else {
            $validation['code'] = false;
        }
        return $validation;
    }

}