<?php

class Route
{

    protected $modelPath = 'app/models/';
    protected $controllerPath = 'app/controllers/';


    protected $prefixController = 'controller_';
    protected $prefixModel = 'model_';
    protected $prefixAction = 'action_';

    protected $controller = 'Main';
    protected $model = 'Main';
    protected $action = 'index';

    protected $url;
    protected $partsUrl;

    protected $controllerName = 'Main';
    protected $modelName = 'Main';

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->parse();

        $this->includeFile();

    }

    protected function parse() :void
    {
        $this->partsUrl = explode('/', $this->url);

        $this->getControllerPath();
        $this->getModelPath();

        $this->getControllerName();
        $this->getModelName();
        $this->getActionName();

    }

    protected function getControllerName()
    {
        if (empty($this->partsUrl[1]) === false) {
            $this->controllerName = ucwords($this->prefixController) . ucwords($this->partsUrl[1]);
        } else {
            $this->controllerName = ucwords($this->prefixController) . ucwords($this->controllerName);
        }

    }

    protected function getModelName()
    {
        if (empty($this->partsUrl[1]) === false) {
            $this->modelName = ucwords($this->prefixModel) . ucwords($this->partsUrl[1]);
        } else {
            $this->modelName = ucwords($this->prefixModel) . ucwords($this->modelName);
        }

    }

    protected function getActionName() : void
    {
        if (empty($this->partsUrl[2]) === false) {
            $this->action = $this->prefixAction . $this->partsUrl[2];
        } else {
            $this->action = $this->prefixAction . $this->action;
        }

    }

    protected function getControllerPath()
    {
        if (empty($this->partsUrl[1]) === false) {
            $this->controller = $this->controllerPath . $this->normalizeStringFileName($this->prefixController . $this->partsUrl[1]);
        } else {
            $this->controller = $this->controllerPath . $this->normalizeStringFileName($this->prefixController . $this->controller);
        }
    }


    protected function getModelPath() : void
    {
        if (empty($this->partsUrl[1]) === false) {
            $this->model = $this->modelPath . $this->normalizeStringFileName($this->prefixModel . $this->partsUrl[1]);
        } else {
            $this->model = $this->modelPath . $this->normalizeStringFileName($this->prefixModel . $this->model);
        }
    }

    protected function includeFile()
    {
        if ($this->isFileExist($this->controller)) {
            $this->includeController();
        } else {
            $this->ErrorPage404();
        }

        if ($this->isFileExist($this->model)) {
            $this->includeModel();
        }
    }

    protected function includeModel()
    {
        include $this->model;
    }

    protected function includeController()
    {
        return include $this->controller;
    }

    protected function isFileExist($fileName) : bool
    {
        return file_exists($fileName);
    }

    protected function normalizeStringFileName(string $someString) : string
    {
        return strtolower($someString) . '.php';
    }

    public function ErrorPage404() : void
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';

        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
    }

    public function run()
    {

        $controller = new $this->controllerName;
        $action = $this->action;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            $this->ErrorPage404();
        }
    }
}