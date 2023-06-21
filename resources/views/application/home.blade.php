@extends('layouts.main')

@section('content')
    <div class="small-box bg-info">
        <div class="inner">
            <h3 style="text-align: center;">{{ $properties }}</h3>

            <p style="text-align: center;"><strong>Imóveis cadastrados</strong></p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
    <div class="small-box bg-warning">
        <div class="inner">
            <h3 style="text-align: center;">{{ $customers }}</h3>

            <p style="text-align: center;"><strong>Clientes cadastrados</strong></p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
    </div>
@endsection
