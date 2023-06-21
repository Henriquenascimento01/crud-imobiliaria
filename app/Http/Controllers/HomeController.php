<?php

namespace App\Http\Controllers;

use App\Services\CustomerServices;
use App\Services\PropertyServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $customerServices;
    protected $propertiesServices;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerServices $customerServices, PropertyServices $propertiesServices)
    {
        $this->customerServices = $customerServices;
        $this->propertiesServices = $propertiesServices;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = $this->propertiesServices->getNumberOfProperties();
        $customers = $this->customerServices->getNumberOfCustomers();

        return view('application.home', compact('properties', 'customers'));
    }
}
