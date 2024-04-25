<?php

namespace App\Repositories;

use App\Repositories\contracts\RepositoriesInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepo implements RepositoriesInterface
{
    protected Model $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get(): Collection|array
    {
        return $this->model->query()->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data)
    {
        $element = $this->model->find($id);
        if (!$element) return false;
        return $element->update($data);
    }

    public function delete($id)
    {
        $element = $this->model->find($id);
        if (!$element) return false;
        return $element->delete();
    }

}
