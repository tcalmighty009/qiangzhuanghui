<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/18
 * Time: 17:19
 */

namespace Baymax\Controller;


use Baymax\App;
use Baymax\Logic\UserLogic;

class UserController extends App {

    public function userLogin() {
        $data = array();
        if ($this->request->isGet()) {
            $data['title'] = '注册';
            $this->app->render('home/login.php', $data);
        } else {
            $userLogic = new UserLogic($this->app);
            if ($userLogic->login()) {
                $this->app->redirect('/user/info');
            } else {
                $this->app->redirect('/user/login');
            }
        }
    }

    public function userInfo() {
        $data['title'] = '我的';
        $this->app->render('home/userInfo.php', $data);
    }

    public function userBusiness() {
        $data['title'] = '我的业务';
        $view = null;
        //获得用户业务分类，显示不同视图
        $business = $this->getSession('business');
        switch ($business) {
            case '抢公司':
                $view = 'company.php';
                break;
            case '抢工长':
                $view = 'foreman.php';
                break;
            case '抢设计':
                $view = 'design.php';
                break;
            case '抢材料':
                $view = 'material.php';
                break;
        }
        //获取用户业务数据
        $data['business'] = (new UserLogic($this->app))->getUserBusiness($this->getSession('login'));
        $this->app->render('home/' . $view, $data);
    }

    /**
     * 用户业务注册，get请求显示表单，post处理表单
     */
    public function regBusiness() {
        $data = array();
        if ($this->request->isGet()) {
            //get请求处理
            $data['title'] = '注册业务';
            $this->app->render('home/regBusiness.php', $data);
        } else {
            //post请求处理
            (new UserLogic($this->app))->regBusiness();
        }
    }

}