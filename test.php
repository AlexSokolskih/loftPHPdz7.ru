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
        $user = User::where('login', '=', $login)->get()->toArray();

        if (is_array($user[0])) {
           return true;
        } else {
            return false;
        }
    }


    public function userAndPasswordConformity($login='', $password='')
    {

        $passwordInBase =  User::where('login', '=', $login)->first()->password;//->toArray(); //$this->pdo->prepare('SELECT * FROM table_name WHERE login= :login');
        echo '<br>'.$login.'<br>'.$password.'<br>';
        var_dump($passwordInBase);

        if ($passwordInBase != '') {
            if ($password == $passwordInBase) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function saveNewUser($login, $password)
    {
        try {
            $user = new User;
            $user->login=$login;
            $user->password=$password;
            $user->save();
            return true;
        } catch (Exception $e) {
            echo '<br><br><br>asdasdas<br>';
            var_dump($e);
            return false;
        }
    }

}


class User extends \Illuminate\Database\Eloquent\Model {}


$dataBase = new DataBase();

//var_dump($dataBase -> userAndPasswordConformity('q2','$6$naborSimvolovFor$s7j6Oyieq2YQ/O/vd52VtEQ.XuY1YQymDFZIC6TcsuJ0NQ0D34I30UayGAztBezxxsSZpV0vJPbHRUqRIE5AQ'));
//var_dump($dataBase->is_userInDataBase('q34'));

$dataBase->saveNewUser('g5', 'q5');