<?php

namespace App\Core;

class Request
{
    private $server;
    private $post;
    private $get;
    private $files;


    public function __construct(
        array $server = [],
        array $post = [],
        array $get = [],
        array $files = []
    )
    {
        $this->server = $server;
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
    }

    public function getServer()
    {
        return $this->server;
        return !is_null($index) & isset($this->server[$index]) ? $this->server[$index] : null;

    }

    public function getPost()
    {
        return $this->post;
    }

    public function getGet()
    {
        return $this->get;
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function getServerData($index = null)
    {
        return $this->getData($this->server, $index);
    }

    public function getPostData($index = null)
    {
        return $this->getData($this->post, $index);
    }

    public function getGetData($index = null)
    {
        return $this->getData($this->get, $index);
    }

    public function getFilesData($index = null)
    {
        return $this->getData($this->get, $index);
    }

    public function getController()
    {
        $urlParts = $this->getUrlParts();

        // If controller name is not set in URL return default one
        if (!isset($urlParts[0])) {
            return APP_CONTROLLER_NAMESPACE . APP_DEFAULT_CONTROLLER;
        }
        $controllerName = sprintf("%s%s",$urlParts[0],APP_CONTROLLER_SUFFIX);
        // If controller exists in system then return it
        if (class_exists(APP_CONTROLLER_NAMESPACE . $controllerName)) {
            return APP_CONTROLLER_NAMESPACE . $controllerName;
        }

        // Otherwise
        http_response_code(404);
        throw new \Exception(sprintf('Controller cannot be found: [%s]', APP_CONTROLLER_NAMESPACE . $urlParts[0]), 404);
    }

    public function getMethod($controller)
    {
        $urlParts = $this->getUrlParts();

        // If controller method is not set in URL return default one
        if (!isset($urlParts[1])) {
            return APP_DEFAULT_CONTROLLER_METHOD . APP_CONTROLLER_METHOD_SUFFIX;
        }

        // If controller method name pattern is invalid
        if (!preg_match('/^[a-z\-]+$/', $urlParts[1])) {
            http_response_code(400);
            throw new \Exception(sprintf('Invalid method: [%s]', $urlParts[1]), 400);
        }

        // If controller method exists in system then return it
        $method = $this->constructMethod($urlParts[1]);
        if (method_exists($controller, $method)) {
            return $method;
        }

        // Otherwise
        http_response_code(404);
        throw new \Exception(sprintf('Method cannot be found: [%s:%s]', $controller, $method), 404);
    }

    private function getUrlParts()
    {
        $url = str_replace(APP_INNER_DIRECTORY, null, $this->getServerData('REQUEST_URI'));
        // removing queryString
        $url = current(explode('?',$url));

        $urlParts = explode('/', $url);
        $urlParts = array_filter($urlParts);
        $urlParts = array_values($urlParts);
        return $urlParts;

    }

    private function constructMethod($methodPart)
    {
        $method = null;
        $parts = explode('-', $methodPart);
        foreach ($parts as $part) {
            if (!$method) {
                $method = $part;
            } else {
                $method .= ucfirst($part);
            }
        }

        return $method . APP_CONTROLLER_METHOD_SUFFIX;
    }

    /**
     * @param array $dataFrom
     * @param $index
     * @return mixed|null\
     */
    private function getData($dataFrom = [], $index)
    {
        return !is_null($index) & isset($dataFrom[$index]) ? $dataFrom[$index] : null;
    }
}