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
        return $this->getData($this->files, $index);
    }

    /**
     * @param array $dataFrom
     * @param $index
     * @return mixed|null
     */
    private function getData(array $dataFrom, $index = null)
    {
        return !is_null($index) && isset($dataFrom[$index]) ? $dataFrom[$index] : null;
    }
}