<?php

namespace App\Repositories;

interface BaseRepositoryInterface {
    public function create(array $attributes);
    public function all($columns = array('*'));
    public function find($id, $columns = array('*'));
    public function destroy($ids);
    public function update($id,$attributes);
    public function whereIn($id, array $values);
    public function with($relations);
}