<?php
/**
 * Created by PhpStorm.
 * User: sokolskih
 * Date: 23.06.2017
 * Time: 17:59
 */
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


class DataBase {


    function __construct() {
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
    }


    public function getUsersList()
    {
        $userslist =User::all();   //   $this->pdo->query('SELECT * FROM table_name');
        while ($row = $userslist) {
            $users[] = $row;
        }
        return $users;
    }

    public function is_userInDataBase($login)
    {
        $user = User::find('login', $login)->first();


        if (is_object($row)) {
            return true;
        } else {
            return false;
        }
    }

}


class User extends \Illuminate\Database\Eloquent\Model {}


$dataBase = new DataBase();

$users=User::all();
foreach ($users as $user) {
    echo $user->id.'<br>';
}

$login='q2';

$user = User::where('login', '=', $login)->get()->toArray();
var_dump($user);

if (is_array($user[0])) {
    echo 'true';
} else {
    echo 'false';
}