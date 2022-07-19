<?php
session_start();

date_default_timezone_set('Europe/Tirane');
setlocale(LC_TIME, array('sq_SQ.UTF-8','sq_SQ@euro','sq_SQ','shqip'));

//batabase config
$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'ag_portfilo_startlab',
        'options' => [
            PDO::ATTR_PERSISTENT => FALSE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]
    ],

    'session' => [
        'sessionName' => 'user',
        'sessionRole' =>  'role',
        'sessionToken' => 'token',
        'sessionLogin' => 'login',
        // 'sessionPermissions' => 'permissions',
    ],
];


spl_autoload_register(function ($class) {
    require_once __dir__. '/classes/' . $class . '.php';
});

$info = \DB::getDB()->sql("SELECT * FROM abouts")->firstResult();

require_once 'function.php';

$field = [
    'name' => con($info->name,'Alpet Gexha'),
    'app_name' => 'Alpet Gexha | Portfilo ',
    'status'  => con('Web Developer'),
    'email' => con($info->email,'agexha@gmail.com'),
    'phone' => con($info->phone,'+383 44 567 631'),
    'address' => con($info->address,'Kosova'),
    'facebook' => con($info->facebook,'https://www.facebook.com/alpet.gexha'),
    'twitter' => con($info->twitter,'https://twitter.com/alpetgexha'),
    'instagram' => con($info->instagram,'https://www.instagram.com/alpetgexha'),
    'linkedin' => con($info->linkedin,'https://www.linkedin.com/in/alpet-gexha-b9a8b917b/'),
    'github' => con($info->github,'https://github.com/AlpetGexh'),
    'cv' => con('https://drive.google.com/file/d/1uO01zQkiozJ0kryjRz9Tq2Z2bOKZoZhw/view?usp=sharing'),
];

$GLOBALS['config'] = array_merge($GLOBALS['config'],['info' => $field]);




