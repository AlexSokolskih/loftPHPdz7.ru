<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17.04.2017
 * Time: 22:33
 */
class Controller_users extends Controller
{
    function __construct()
    {
        session_start();
        if ($_SESSION['authorized'] != true) {
            header('Location:/autorization');
            exit;
        }

        parent::__construct();
        $this->model = new Model_users();
    }


    public function action_index()
    {
        $data = $this->model->get_data();

        $this->view->generate('users_view.twig',
            array(
                'title' => 'Пользователи',
                'data' => $data
            ));
    }


    public function action_delete($user_id)
    {
        $this->model->delete_user($user_id);
        $this->action_index();
    }

    public function action_edit($user_id)
    {
        $data = $this->model->get_user($user_id);
        $this->view->generate('user_edit.twig',
            array(
                'title' => 'Редактируем пользователя',
                'data' => $data
            ));
    }

    public function action_update()
    {
        $validation = $this->model->update_user();
        if ($validation === true) {
            $this->action_index();
        } else {
            $user_id = $_POST["id"];
            $data = $this->model->get_user($user_id);
            $this->view->generate('user_edit.twig',
                array(
                    'title' => 'Редактируем пользователя',
                    'data' => $data,
                    'message' => $validation
                ));

        }
    }

}