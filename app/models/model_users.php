<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17.04.2017
 * Time: 21:49
 */
class Model_users extends Model
{
    public function get_data()
    {

        $dataBase = new DataBase();
        $usersList = $dataBase->getUsersList();

        foreach ($usersList as $index => $item) {
            $usersList[$index]['adulthood'] = ($item['age'] >= 18) ? 'совершеннолетний' : 'несовершеннолетний';

        }

        $sort = array();
        foreach ($usersList as $key => $row)
            $sort[$key] = $row['age'];

        array_multisort($sort, SORT_ASC, $usersList);

        return $usersList;
    }

    public function delete_user($user_id)
    {
        $dataBase = new DataBase();
        $dataBase->deleteUser($user_id);
    }

    public function get_user($user_id)
    {
        $dataBase = new DataBase();
        $user = $dataBase->getUser($user_id);
        return $user;
    }

    public function update_user()
    {
        var_dump($_POST);

        $userValid = GUMP::is_valid($_POST, [
            'id' => 'required|integer',
            'login' => 'required|alpha_numeric',
            'name' => 'required|min_len,5',
            'description' => 'required|min_len,50',
            'age' => 'required|min_numeric,10|max_numeric,100'
        ]);

        var_dump($userValid);
        if ($userValid === true) {
            $user = new User();
            $user->id = $_POST["id"];
            $user->login = $_POST["login"];
            $user->name = $_POST["name"];
            $user->age = $_POST["age"];
            $user->description = $_POST["description"];

            if (!empty($_FILES['userfoto']["name"])) {
                var_dump($_FILES);
                $main = new Main();
                $user->photo = $main->savePhoto();
            }

            $dataBase = new DataBase();

            $user = $dataBase->updateUser($user);
            return true;
        }


        return implode('<br>', $userValid);
    }
}

