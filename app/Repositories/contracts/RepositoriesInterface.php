<?php

namespace App\Repositories\contracts;

interface RepositoriesInterface
{
    public function get($params = null);

    public function create(array $data);
    public function find($params);

    public function update($params, array $data);

    public function delete($params);

}
