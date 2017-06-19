<?php

class Controller_404 extends Controller
{

    public function action_index()
    {
        $this->view->generate('base_view.twig',
            [
                'title' => 'Ошибка 404!',
                'content' => 'Данной страницы не существует!!!'
            ]);
    }

}
