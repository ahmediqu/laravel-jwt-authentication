<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class BaseService 
{
    protected $model;
    protected $attributes = [];

    public function setModel(Model $model)
    {
        $this->model = $model;
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }


    public function setAttrs(array $attrs): BaseService
    {
        $this->attributes = $attrs;
        return $this;
    }

    public function getAttrs($columns = null): array
    {
        $columns = is_array($columns) ? $columns : func_get_args();

        if (count($columns)) {
            return Arr::only($this->attributes, $columns);
        }

        return $this->attributes;
    }



    public function save($options = [])
    {
        $attributes = count($options) ? $options : request()->all();

        $this->model
            ->fill($this->getFillAble($attributes))
            ->save();

        return $this->model;
    }

    public function getAttr($key)
    {
        return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
    }

    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }
}