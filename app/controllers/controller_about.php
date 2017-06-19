<?php

class Controller_About extends Controller
{

    public function action_index()
    {
        $this->view->generate('base_view.twig',
            array(
                'title' => 'О сайте',
                'content' => "Это контент о сайте"
            ));
    }

}