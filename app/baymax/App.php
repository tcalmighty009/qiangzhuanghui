<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/6/16
 * Time: 11:35
 */

namespace Baymax;

use Baymax\Controller;

class App {

    /**
     * @var null|\Slim\Slim
     */
    protected $app = null;
    /**
     * @var null|\Slim\Http\Request
     */
    protected $request = null;
    /**
     * @var null|\Slim\Environment
     */
    protected $env = null;

    /**
     * @param $app \Slim\Slim
     */
    public function __construct($app) {
        $this->app = $app;
        $this->request = $app->request;
        $this->env = $app->environment;
        $this->response = $app->response;
    }

    /**
     * @param $name
     */
    public static function registerRoute($name,$app) {
        require ROUTE_DIR . $name . '.php';
    }

    public static function getSession($name) {
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    public static function setSession($name, $value) {
        $_SESSION[$name] = $value;
    }

    /**
     * 循环验证表单
     * @param $regExp
     * @return array 表单验证结果集
     */
    public function regExpValidation($regExp) {
        $validation = array();
        foreach ($regExp as $key => $value) {
            $validation[$key] = preg_match($value, $this->request->post($key));
        }
        return $validation;
    }

    /**
     * 获得多选框的值
     * @param string $key
     * @return array
     */
    public function getPostCheckbox($key = null) {
        if (isset($this->env['slim.input'])) {
            $input = explode('&', $this->env['slim.input']);
            $output = array();
            foreach ($input as $value) {
                mb_parse_str($value, $value);
                if (key($value) == $key) {
                    $output[] = $value[$key];
                }
            }
        } else {
            throw new \RuntimeException('Missing slim.input in environment variables');
        }

        return $output;
    }
}