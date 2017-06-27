<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22.04.2017
 * Time: 11:43
 */
class Model_autorization extends Model
{
    public function get_data()
    {
        $dataBase = new DataBase();
        $main = new Main();
        if (isset($_POST['login'])) {
            $user = htmlspecialchars($_POST['login']);


            if (isset($_POST['password'])) {
                $password = htmlspecialchars($_POST['password']);
            }

            if ($dataBase->is_userInDataBase($user) and $dataBase->userAndPasswordConformity($user, $main->cpyptPassword($password))) {

                $_SESSION['authorized'] = true;
                $message = 'Авторизация успешна';
            } else {
                $_SESSION['authorized'] = false;
                session_write_close();

                $message = 'Авторизация неуспешна';
                $message .= $user.'<br>'.$main->cpyptPassword($password).'@@@@@@@@@@@@@@@@@qwe';
            }
        }

        return $message;

    }
}