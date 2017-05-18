<?php

namespace App\Repositories\Abstracts;
use App\Repositories\Interfaces\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface {

    protected $modelClassName;

    public function create(array $attributes)
    {
        return call_user_func_array("{$this->modelClassName}::create", array($attributes));
    }

    public function all($columns = array('*'))
    {
        return call_user_func_array("{$this->modelClassName}::all", array($columns));
    }

    public function find($id, $columns = array('*'))
    {
        return call_user_func_array("{$this->modelClassName}::find", array($id, $columns));
    }

    public function destroy($ids)
    {
        return call_user_func_array("{$this->modelClassName}::destroy", array($ids));
    }

    public function update($id, $attributes)
    {
        $result = call_user_func_array("{$this->modelClassName}::findOrFail", array($id));
        $result->update(array_filter($attributes));
        return $result;
    }

    public function whereIn($id, array $values)
    {
        $result = call_user_func_array("{$this->modelClassName}::whereIn", array($id,$values));
        return $result;
    }
}