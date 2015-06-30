<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/14
 * Time: 10:44
 */

namespace Baymax\Model;

use MongoCursorException;
use MongoException;

class CategoryModel extends BaseModel {

    /**
     * @var \MongoCollection
     */
    private $collection = null;

    private $category = [
        [
            'name' => '抢公司',
            'label' => 'company',
            'ioc' => '/assets/upload/1.png',
            'summary' => '装饰公司、设计公司、家政公司',
            'sort' => 0
        ],
        [
            'name' => '抢工长',
            'label' => 'foreman',
            'ioc' => '/assets/upload/2.png',
            'summary' => '各类工长、自装、瓦工、水电工等',
            'sort' => 0
        ],
        [
            'name' => '抢设计',
            'label' => 'design',
            'ioc' => '/assets/upload/3.png',
            'summary' => '本地家装、工装、景观优秀设计师',
            'sort' => 0
        ],
        [
            'name' => '抢材料',
            'label' => 'material',
            'ioc' => '/assets/upload/4.png',
            'summary' => '地板、瓷砖、橱柜等各类装饰材料商家',
            'sort' => 0
        ],
        [
            'name' => '抢楼盘',
            'label' => 'houses',
            'ioc' => '/assets/upload/5.png',
            'summary' => '本地各类待售楼盘',
            'sort' => 0
        ],
        [
            'name' => '促销活动',
            'label' => 'promotions',
            'ioc' => '/assets/upload/6.png',
            'summary' => '本地最新装修建材促销特价活动',
            'sort' => 0
        ],
        [
            'name' => '发布招标',
            'label' => 'tender',
            'ioc' => '/assets/upload/7.png',
            'summary' => '免费发布装修及材料招标，直接省钱30%',
            'sort' => 0
        ],
    ];

    public function __construct($app) {
        parent::__construct($app);
        $this->collection = $this->mongo->selectCollection('category');
    }

    public function create() {
        $this->collection->ensureIndex(array('name' => 1), array('unique' => true));
        $this->collection->ensureIndex(array('label' => 1), array('unique' => true));
    }

    public function delIndex() {
        $this->collection->deleteIndex('name');
        $this->collection->deleteIndex('label');
    }

    public function install() {
        foreach ($this->category as $value) {
            try {
                var_dump($this->collection->save($value));
            } catch (MongoCursorException $e) {
                var_dump($e->getCode());
            } catch (MongoException $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function find() {
        return iterator_to_array($this->collection->find());
    }

}