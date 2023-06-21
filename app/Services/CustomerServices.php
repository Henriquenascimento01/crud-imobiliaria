<?php

namespace App\Services;

use App\Models\Customer;

class CustomerServices
{
    protected $model;

    public function __construct(Customer $model)
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

    public function findCustomerById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $customer = $this->findCustomerById($id);
        $customer->update($data);

        return $customer;
    }

    public function delete($id)
    {
        $customer = $this->findCustomerById($id);
        $customer->delete();
    }

    public function getNumberOfCustomers()
    {
        return $this->model->count();
    }
}
