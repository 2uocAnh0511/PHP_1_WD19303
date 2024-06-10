<?php

namespace App\Model;

interface CrudInterface{
    public function getAll();

    public function getOne(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): bool;
    
}