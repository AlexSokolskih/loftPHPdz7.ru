<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 08.07.2017
 * Time: 0:57
 */
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

        $host = '127.0.0.1';
        $db = 'loftschool';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';
        $dbdriver='mysql';



        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => $dbdriver,
            'host' => $host,
            'database' => $db,
            'username' => $user,
            'password' => $pass,
            'charset' => $charset,
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        // Setup the Eloquent ORM…
        $capsule->setAsGlobal();
        $capsule->bootEloquent();


        Capsule::schema()->create('orders', function ($table){
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('category');
        });

        Capsule::schema()->create('categorys', function ($table){
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('category');
        });


