@extends('layouts.main')

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="{{ asset('storage/' . $property->property_photo) }}" alt="" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-10">
                <p class="mt-3"><strong>{{ $property->property_name }}</strong></p>
                <p class="address_street"><strong>Rua: </strong>{{ $property->address_street }}
                    <strong>{{ $property->address_city }}-{{ $property->address_state }}</strong>,
                </p>
                <p class=""><strong>Proprietário:</strong> {{ $property->customer->name }}</p>
                <p class=""><strong>CEP:</strong> {{ $property->address_zip_code }} </p>
            </div>
            <div class="col-md-12" id="description-container">
                <a href="{{ route('properties.index') }}" class="btn btn-info">Página anterior</a>
                <p class="session-description"></p>
            </div>
        </div>
    </div>
@endsection
