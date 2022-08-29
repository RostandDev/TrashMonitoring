<?php
namespace core;

abstract class View
{
    protected $data;

    public function __construct($_data=[]) {
        $this->data = $_data;
    }

    public abstract function html();
}