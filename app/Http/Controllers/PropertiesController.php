<?php

namespace App\Http\Controllers;

use App\Services\PropertyServices;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected $customerServices;

    public function __construct(PropertyServices $customerServices)
    {
        $this->customerServices = $customerServices;
    }

    public function index()
    {
        return view('application.properties.index');
    }

    public function create()
    {
        return view('application.properties.create');
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

