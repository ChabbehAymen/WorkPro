<?php

namespace App\Repositories\contracts;

interface RepositoriesInterface
{
    public function get();

    public function create(array $data);
    public function find(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);

}
