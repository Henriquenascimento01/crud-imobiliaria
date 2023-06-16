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
        return view('application.customers.index');
    }

    public function create()
    {
        return view('application.customers.create');
    }

    public function store(Request $request)
    {
        $this->customerServices->create($request->all());

        return back(); 
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
