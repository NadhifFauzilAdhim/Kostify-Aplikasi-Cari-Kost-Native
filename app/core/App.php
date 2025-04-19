<?php
// kostifynative/app/core/App.php

class App {
    protected $controller = 'Home';
    protected $method     = 'index';
    protected $params     = [];

    public function __construct() {
        // 1. Parse URL
        $url = $this->parseURL();

        // 2. Controller selection
        if (!empty($url[0]) &&
            file_exists(__DIR__ . '/../controllers/' . ucfirst($url[0]) . '.php')
        ) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        } elseif (!empty($url[0])) {
            $this->controller = 'ErrorController';
            $this->method     = 'show404';
        }

        // 3. Load controller class
        require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 4. Method selection
        if (!empty($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } elseif (!empty($url[1])) {
            require_once __DIR__ . '/../controllers/ErrorController.php';
            $this->controller = new ErrorController();
            $this->method     = 'show404';
        }

        // 5. Params
        $this->params = $url ? array_values($url) : [];

        // 6. Run the controller::method with params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
