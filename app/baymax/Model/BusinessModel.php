<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/28
 * Time: 14:32
 */

namespace Baymax\Model;

use MongoCursorException;
use MongoException;

class BusinessModel extends BaseModel {

    public $code = null;
    /**
     * @var \MongoCollection
     */
    private $collection = null;

    public function __construct($app) {
        parent::__construct($app);
        $this->collection = $this->mongo->selectCollection('business');
    }

    /**
     * @param array $value 业务字段
     * @param array $user 所属用户
     * @return bool 是否创建成功
     */
    public function creatBusiness(array $value, array $user) {
        $created = true;
        try {
            $value['user'] = $user['_id'];
            $this->collection->save($value);
        } catch (MongoCursorException $e) {
            $created = false;
            $this->code = $e->getCode();
        } catch (MongoException $e) {
            $created = false;
            $this->code = $e->getCode();
        }
        return $created;
    }

    /**
     * 获得用户的业务
     * @param $userId string 业务所属用户
     * @return array
     */
    public function getUserBusiness($userId) {
        $userId = new \MongoId($userId);
        $query = $query = array('user' => $userId);
        return $this->collection->findOne($query);
    }

}