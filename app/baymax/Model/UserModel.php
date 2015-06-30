<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/18
 * Time: 14:42
 */

namespace Baymax\Model;


use MongoCursorException;
use MongoException;

class UserModel extends BaseModel {

    public $return = null;
    public $code = null;
    /**
     * @var \MongoCollection
     */
    private $collection = null;

    public function __construct($app) {
        parent::__construct($app);
        $this->collection = $this->mongo->selectCollection('user');
    }

    public function create() {
        $this->collection->ensureIndex(array('name' => 1), array('unique' => true));
        $this->collection->ensureIndex(array('phone' => 1), array('unique' => true));
    }

    public function delIndex() {
        $this->collection->deleteIndex('name');
        $this->collection->deleteIndex('phone');
    }

    public function creatUser(array $value) {
        $created = true;
        try {
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

//    public function install() {
//        foreach ($this->category as $value) {
//            try {
//                var_dump($this->collection->save($value));
//            } catch (MongoCursorException $e) {
//                var_dump($e->getCode());
//            } catch (MongoException $e) {
//                var_dump($e->getMessage());
//            }
//        }
//    }

    /**
     * @param $name
     * @return array|null
     */
    public function findByName($name) {
        $query = array('name' => $name);
        return $this->collection->findOne($query);
    }

    public function findByPhone($phone) {
        $query = array('phone' => $phone);
        return $this->collection->findOne($query);
    }

    public function updataBusiness($id) {
        $updata = true;
        //当前用户mongoid
        $id = new \MongoId($id['$id']);
        //查询条件
        $query = array('_id' => $id);
        //获得用户
        $user = $this->collection->findOne($query);
        if ($user) {
            $this->return = $user;
            try {
                $this->collection->update($user, array('$set' => array('business' => $this->request->post('company-business'))));
            } catch (MongoCursorException $e) {
                $updata = false;
                $this->code = $e->getCode();
            } catch (MongoException $e) {
                $updata = false;
                $this->code = $e->getCode();
            }
        } else {
            $updata = false;
        }

        return $updata;
    }
}