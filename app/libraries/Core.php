<?php

/*
 * App Core Class
 * Create URL & loads controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->getURL();
        //return error if url is null
        if (is_null($url)) {
            $url = $this->currentController;
        }
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            //if exists, set as controller
            $this->currentController = ucwords($url[0]);
            //unset 0 index
            unset($url[0]);
        } else {
//            echo 'Controller not found' . '<br>';
        }
        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        //instantiate controller class
        $this->currentController = new $this->currentController;
        //assign old value of $url (because we assign "$url = $this->getURL();" to handle null error)
        $url = $this->getURL();
        //check for second part of url
        if (isset($url[1])) {
            //check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                //unset 1 index
                unset($url[1]);
            } else {
//                echo 'Method not found' . '<br>';
            }
        }
        //get params
        $this->params = $url ? array_values($url) : [];
        //call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
