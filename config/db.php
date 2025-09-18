<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db;dbname=mini_blog', //Для запуска Docker контейнера
    // 'dsn' => 'mysql:host=localhost;dbname=mini_blog',
    'username' => 'root',
    'password' => 'rootpassword', //Для запуска Docker контейнера
    // 'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
