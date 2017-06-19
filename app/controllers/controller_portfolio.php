<?php

class Controller_Portfolio extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new Model_Portfolio();
    }

    public function action_index()
    {
        $data = $this->model->get_data();

        $this->view->generate('portfolio_view.twig',
            array(
                'title' => 'Портфолио',
                'data' => $data
            ));
    }

}