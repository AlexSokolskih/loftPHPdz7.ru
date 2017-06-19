<?php

class Controller_Main extends Controller
{

    public function action_index()
    {
        $this->view->generate('base_view.twig',
            array(
                'title' => 'Главная страница',
                'content' => 'Это контент главной страницы'
            ));
    }

}