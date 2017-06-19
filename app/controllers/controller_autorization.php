<?php

class Controller_autorization extends Controller
{


    function __construct()
    {
        parent::__construct();
        $this->model = new Model_autorization();
    }

    public function action_index()
    {
        session_start();
        $data = $this->model->get_data();

        $this->view->generate('autorization_view.twig',
            [
                'title' => 'Зарегистрируйтесь',
                'message' => $data
            ]);
    }

}
