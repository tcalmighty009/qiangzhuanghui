<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/14
 * Time: 10:45
 */

namespace Baymax\Model;


use Baymax\App;
use Slim\Slim;

class BaseModel extends App {

    /**
     * @var \MongoDB
     */
    protected $mongo = null;

    /**
     * @param $app Slim
     */
    public function __construct($app) {
        parent::__construct($app);
        $this->mongo = (new \MongoClient($this->app->config('mongo')))->selectDB($this->app->config('mongo.db'));
    }

}