<?php

namespace App\Http\Controllers;

use App\Services\PropertyServices;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    protected $propertiesServices;

    public function __construct(PropertyServices $propertiesServices)
    {
        $this->propertiesServices = $propertiesServices;
    }

    public function index()
    {
        $properties = $this->propertiesServices->getAll();

        return view('application.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('application.properties.create');
    }

    public function store(Request $request)
    {
        $this->propertiesServices->create($request->all());

        return back();
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
