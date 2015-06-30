<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/16
 * Time: 15:10
 */

namespace Baymax\Controller;


use Baymax\App;
use Baymax\Model\CategoryModel;

class HomeController extends App {

    public function index() {
        $category = new CategoryModel($this->app);
        $data['title'] = '首页';
        $data['category'] = $category->find();
        $this->app->render('index.php', $data);
    }

}