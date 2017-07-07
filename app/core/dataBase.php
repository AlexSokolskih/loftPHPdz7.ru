<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 14.03.2017
 * Time: 0:11
 */

//namespace Models;
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

        /*Capsule::schema()->table('users', function ($table){
            $table->string('ip',16)->nullable();
            //$table->timestamps();
        }); */

}


    public function getUsersList()
    {
        $userslist =User::all()-> toArray();   //   $this->pdo->query('SELECT * FROM table_name');

        return $userslist;
    }

    public function getUser($user_id)
    {
        $user = User::find($user_id)->toArray();
        return $user;

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

            if ($password == $passwordInBase) {
                return true;
            } else {
                return false;
            }
    }

    public function saveNewUser($login, $password, $ip)
    {
        try {
            $user = new User;
            $user->login=$login;
            $user->password=$password;
            $user->ip=$ip;
            $user->save();
            return true;
        } catch (Exception $e) {
            var_dump($e);
            return false;
        }
    }

    public function deleteUser($user_id)
    {
        $user = User::find($user_id);
        $user ->delete();
    }

    public function updateUser($user)
    {
        $userNewData = User::find($user->id);
        $userNewData->login=$user->login;
        $userNewData->name=$user->name;
        $userNewData->age=$user->age;
        $userNewData->description=$user->description;
        if (!empty($user->photo)){
            $userNewData->photo=$user->photo;
        }
        $userNewData->save();
    }

}


class User extends \Illuminate\Database\Eloquent\Model {}


/*

class DataBase
{



    protected $pdo;

    function __construct()
    {
        $host = '127.0.0.1';
        $db = 'loftschool';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $opt);
    }


    public function showUsers()
    {
        $userslist = $this->pdo->query('SELECT * FROM table_name');
        while ($row = $userslist->fetch()) {
            echo $row['name'] . '<br>';
        }
    }

    public function getUsersList()
    {
        $userslist = $this->pdo->query('SELECT * FROM table_name');
        while ($row = $userslist->fetch()) {
            $users[] = $row;
        }
        return $users;
    }

    public function getUserForId($userId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM table_name WHERE id= :id');
        $stmt->execute([$userId]);
        $user = false;
        foreach ($stmt as $row) {
            $user = $row;
        }
        return $user;
    }

    public function is_userInDataBase($login)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM table_name WHERE login= :login');
        $stmt->execute([$login]);
        $row = $stmt->fetch(PDO::FETCH_LAZY);
        if (is_object($row)) {
            return true;
        } else {
            return false;
        }
    }

    public function saveNewUser($login, $password)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO `loftschool`.`table_name` (login, password, `name`, `age`, `description`, `photo`) VALUES (:login, :password, '', '', '', NULL)");
            $stmt->execute(array('login' => $login, 'password' => $password));
            return true;
        } catch (Exception $e) {
            var_dump($e);
            return false;
        }
    }

    public function deleteUser($userID)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM table_name WHERE id = :id');
            $stmt->execute([$userID]);
            return true;
        } catch (Exception $e) {
            var_dump($e);
            return false;
        }
    }

    public function updateUser($id, $name, $description, $age, $photo)
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE `loftschool`.`table_name` SET name = :name, `age` = :age, description = :description, photo = :photo WHERE id = :id');
            $stmt->execute(array('id' => $id, 'name' => $name, 'description' => $description, 'age' => $age, 'photo' => $photo));
            return true;
        } catch (Exception $e) {
            var_dump($e);
            return false;
        }

    }

    public function userAndPasswordConformity($login, $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM table_name WHERE login= :login');
        $stmt->execute([$login]);
        $row = $stmt->fetch(PDO::FETCH_LAZY);
        if (is_object($row)) {
            if ($password == $row['password']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


}
*/