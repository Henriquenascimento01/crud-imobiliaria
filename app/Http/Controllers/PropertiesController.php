<?php

namespace App\Http\Controllers;

use App\Services\CustomerServices;
use App\Services\PropertyServices;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    protected $propertiesServices;
    protected $customerServices;

    public function __construct(PropertyServices $propertiesServices, CustomerServices $customerServices)
    {
        $this->propertiesServices = $propertiesServices;
        $this->customerServices = $customerServices;
    }

    public function index()
    {
        $properties = $this->propertiesServices->getAll();

        return view('application.properties.index', compact('properties'));
    }

    public function create()
    {
        $customers = $this->customerServices->getAll();

        return view('application.properties.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->propertiesServices->create($request->all());

        return back();
    }

    public function show($propertyId)
    {
        $property = $this->propertiesServices->findPropertyById($propertyId);

        return view('application.properties.show', compact('property'));
    }
}
