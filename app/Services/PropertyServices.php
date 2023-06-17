<?php

namespace App\Services;

use App\Models\Property;

class PropertyServices
{
    protected $model;

    public function __construct(Property $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $customer = $this->model->findOrFail($id);
        $customer->update($data);

        return $customer;
    }

    public function delete($id)
    {
        $customer = $this->model->findOrFail($id);
        $customer->delete();
    }
}
