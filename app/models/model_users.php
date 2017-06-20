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
}

class User extends illuminate\database\Eloquent\Model {}
