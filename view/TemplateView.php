<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 21.11.2017
 * Time: 12:48
 */

namespace view;


class TemplateView
{
    private $view;
    private $variables = array();

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function __set($key, $value)
    {
        $this->variables[$key] = $value;
    }
    public function __isset($key) {
        if(!array_key_exists($key, $this->variables))
            return false;
        return isset($this->variables[$key]);
    }
    public function __get($key)
    {
        return $this->variables[$key];
    }
    public function createView()
    {
        extract($this->variables);
        ob_start();
        require_once($this->view);
        return ob_get_clean();

    }
}