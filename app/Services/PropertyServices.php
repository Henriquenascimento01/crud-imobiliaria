<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $imageName = Str::random(10) . '.' . $data['property_photo']->getClientOriginalExtension();

        $path = Storage::disk('public')->putFileAs('property_photos', $data['property_photo'], $imageName);


        $data['property_photo'] = $path;

        return $this->model->create($data);
    }

    public function findPropertyById($propertyId)
    {
        return $this->model->findOrFail($propertyId);
    }

    public function getNumberOfProperties()
    {
        return $this->model->count();
    }
}
