<?php
/**
 * Created by PhpStorm.
 * User: tcalmighty
 * Date: 2015/4/25
 * Time: 9:10
 */

return array(
    'debug' => true,
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'my_secret_key',
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.cipher_mode' => MCRYPT_MODE_CBC,
    'mongo' => 'mongodb://localhost:6666',
    'mongo.db' => 'store',
    'session' => array(
        'expires' => '240 minutes',
        'path' => '/',
        'domain' => null,
        'secure' => false,
        'httponly' => false,
        'name' => 'admin_session',
        'secret' => 'CHANGE_ME',
        'cipher' => MCRYPT_RIJNDAEL_256,
        'cipher_mode' => MCRYPT_MODE_CBC
    ),
    'admin.username' => 'admin',
    'admin.password' => '$P$BwbbyrzgaHjEiYfqnWq9qYyuevK58Q/',
);