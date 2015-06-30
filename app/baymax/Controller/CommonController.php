<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/17
 * Time: 14:24
 */

namespace Baymax\Controller;


use Baymax\App;
use Baymax\Base;
use Baymax\Form\CommonForm;
use Baymax\Model\UserModel;

class CommonController extends App {

    /**
     * @var CommonForm|null
     */
    private $regForm = null;

    public function __construct($app) {
        parent::__construct($app);
        $this->regForm = new CommonForm($this->app);
    }

    public function regOne() {
        if ($this->request->isGet()) {
            $data['title'] = '快速注册';
            $this->app->render('home/regOne.php', $data);
        } else {
            $this->_post_regOne();
        }
    }

    private function _post_regOne() {
        if ($this->regForm->validationRegOne()) {
            $userMode = new UserModel($this->app);
            var_dump($userMode->findByPhone($this->request->post('phone')));
            if ($userMode->findByPhone($this->request->post('phone'))) {
                $this->app->flash('error', 1);
                $this->app->redirect('/common/regOne');
            } else {
                $this->setSession('phone', $this->request->post('phone'));
                $this->setSession('code', 123456);
                $this->app->redirect('/common/regTo');

            }
        }

    }

    public function regTo() {
        if ($this->request->isGet()) {
            $data['title'] = '填写信息';
            if ($this->getSession('phone')) {
                $this->app->render('home/regTo.php',$data);
            } else {
                $this->app->redirect('/common/regOne');
            }
        } else {
            $this->_post_regTo();
        }
    }

    private function _post_regTo() {
        $validation = $this->regForm->validationRegTo();
        if (in_array(0, $validation)) {
            $this->app->flash('validation', $validation);
            $this->app->flash('form', $this->request->post());
            $this->app->redirect('/common/regTo');
        } else {
            $userMode = new UserModel($this->app);
            $password = new \PasswordHash(8, true);
            $user['name'] = $this->request->post('name');
            $user['phone'] = $this->getSession('phone');
            $user['password'] = $password->HashPassword($this->request->post('password'));
            if ($userMode->creatUser($user)) {
                $this->setSession('login', $this->request->post('name'));
                $this->app->redirect('/user/info');
            } else {
                $validation['error'] = 1;
                $this->app->flash('validation', $validation);
                $this->app->flash('form', $this->request->post());
                $this->app->redirect('/common/regTo');
            }
        }
    }

    public function install() {
        $userMode = new UserModel($this->app);
        $userMode->delIndex();
        $userMode->create();
    }

}