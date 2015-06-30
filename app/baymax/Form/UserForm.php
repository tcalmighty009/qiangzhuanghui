<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/19
 * Time: 11:21
 */

namespace Baymax\Form;


use Baymax\App;

class UserForm extends App {

    public function validationLogin() {

    }

    public function validationRegBusiness() {
        $validation = true;

        if (!$this->request->post('company-business')) {
            $validation = false;
            $this->app->flash('business', 1);
        };
        if (!$this->request->post('company-address')) {
            $validation = false;
            $this->app->flash('address', 1);
        };
        $len = strlen($this->request->post('company-name'));
        if ($len < 4) {
            $validation = false;
            $this->app->flash('name', 1);
        }
        if (empty($this->getPostCheckbox('company-area'))) {
            $validation = false;
            $this->app->flash('area', 1);
        }
        if (empty($this->getPostCheckbox('company-type'))) {
            $validation = false;
            $this->app->flash('type', 1);
        }
        return $validation;
    }

}