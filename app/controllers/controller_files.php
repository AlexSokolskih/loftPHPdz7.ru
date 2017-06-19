<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17.04.2017
 * Time: 22:33
 */
class Controller_files extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_files();
    }


    public function action_index()
    {
        session_start();
        if ($_SESSION['authorized'] != true) {
            header('Location:/autorization');
            exit;
        }
        $data = $this->model->get_data();

        $this->view->generate('files_view.twig',
            array(
                'title' => 'файлы',
                'data' => $data
            ));
    }

}