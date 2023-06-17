<?php

namespace App\Http\Controllers;

use App\Services\CustomerServices;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected $customerServices;

    public function __construct(CustomerServices $customerServices)
    {
        $this->customerServices = $customerServices;
    }

    public function index()
    {
        $customers = $this->customerServices->getAll();

        return view('application.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('application.customers.create');
    }

    public function edit($id)
    {
        $customer = $this->customerServices->findCustomerById($id);

        return view('application.customers.edit', compact('customer'));
    }

    public function store(Request $request)
    {
        $this->customerServices->create($request->all());

        return back();
    }

    public function update(Request $request, $id)
    {
        $this->customerServices->update($id, $request->all());
    }

    public function delete($id)
    {
        $this->customerServices->delete($id);
    }
}
