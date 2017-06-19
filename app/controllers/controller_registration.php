<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22.04.2017
 * Time: 10:48
 */
class Controller_registration extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Model_registration();
    }


    public function action_index()
    {

        $data = $this->model->get_data();

        $this->view->generate('registration_view.twig',
            array(
                'title' => 'Зарегистрируйтесь',
                'message' => $data
            ));
    }

}