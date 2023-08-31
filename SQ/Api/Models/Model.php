<?php
namespace SQ\Api\Models;

use SQ\Api\Exceptions\ModelException;

abstract class Model
{
    protected $data = [];

    public function __construct($init_data)
    {
        $this->data = $init_data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function toArray()
    {
        return $this->data;
    }

    /**
     * 检查格式
     *
     * @throws ModelException
     * */
    abstract function check();

}
