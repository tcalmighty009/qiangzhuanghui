<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/19
 * Time: 14:32
 */

namespace Baymax\Logic;


use Baymax\App;
use Baymax\Form\UserForm;
use Baymax\Model\UserModel;
use Baymax\Model\BusinessModel;

class UserLogic extends App {

    public function login() {
        $login = false;
        $user = (new UserModel($this->app))->findByName($this->request->post('name'));
        if ($user) {
            $password = new \PasswordHash(8, true);
            if ($password->CheckPassword($this->request->post('password'), $user['password'])) {
                $this->setSession('login', $user['_id']);
                $login = true;
            }
            if (isset($user['business'])) {
                $this->setSession('business', $user['business']);
            } else {
                $this->setSession('business', false);
            }
        } else {
            $this->app->flash('error', 1);
        }
        return $login;
    }

    /**
     * 用户注册业务
     */
    public function regBusiness() {
        //表单提交验证
        if ((new UserForm())->validationRegBusiness()) {
            $userModel = new UserModel($this->app);
            //更新用户业务
            if ($userModel->updataBusiness($this->getSession('login'))) {
                $businessModel = new BusinessModel($this->app);
                $business = array(
                    'business' => $this->request->post('company-business'),
                    'name' => $this->request->post('company-name'),
                    'area' => $this->getPostCheckbox('company-area'),
                    'type' => $this->getPostCheckbox('company-type'),
                    'address' => $this->request->post('company-address'),
                    'identification' => '未认证'
                );
                //创建用户业务
                if ($businessModel->creatBusiness($business, $userModel->return)) {
                    //创建成功，session记录用户业务类型
                    $this->setSession('business', $this->request->post('company-business'));
                    $this->app->redirect('/user/business');
                } else {
                    //添加业务不成公，跳转至注册表单，显示错误
                    $this->app->flash('error', '业务添加失败，请重新提交');
                    $this->app->redirect('/user/regBusiness');
                }
            } else {
                //更新不成功，跳转至注册表单，显示错误
                $this->app->flash('error', '业务分类更新失败，请重新提交');
                $this->app->redirect('/user/regBusiness');
            }

        } else {
            //表单验证不通过，跳转至注册表单，显示错误
            $this->app->flash('error', '填写有错误，请仔细检查');
            $this->app->redirect('/user/regBusiness');
        }
    }

    /**
     * @param $userId string 用户的$_ID
     * @return array|null
     */
    public function getUserBusiness($userId) {
        $businessModel = new BusinessModel($this->app);
        //获得用户业务
        $business = $businessModel->getUserBusiness($userId['$id']);
        $area = null;
        //将服务区域连接成字符串
        foreach ($business['area'] as $key => $value) {
            if ($key == 0) {
                $area = $value;
            } else {
                $area = $area . '、' . $value;
            }
        }
        $business['area'] = $area;
        return $business;
    }
}