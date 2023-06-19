@extends('layouts.main')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manager sistem</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

        <style>
            .row {
                margin: 0;
            }

            .container-fluid {
                padding: 0;
            }

            .btn-primary {
                border: 2px solid rgb(120, 180, 207);
            }

            #products-container {
                padding: 50px;
            }

            #cards-container {
                display: flex;
            }

            #products-container .card {
                flex: 1 1 0;
                max-width: 25%;
                border-radius: 10px;
                padding: 0;
                margin: 5px;
                background-color: rgb(255, 255, 255);
            }

            #products-container img {
                max-height: 150px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                object-fit: cover;
            }

            .card .card-name {
                font-size: 17px;
                text-align: center;
            }
        </style>
    </head>

    <div id="products-container" class="col-md-12">
        <div id="cards-container" class="row">
            @foreach ($properties as $property)
                <div class="card col-md-3">
                    <img src="{{ asset('/img/moradas-do-bosque.png') }}" alt="">
                    <div class="card-body">
                        <h5 class="card-name">{{ $property->property_name }}</h5>
                        <form action="{{ route('property.store') }}" method="POST" enctype="multpart/form-data">
                            @csrf
                            <a href="" class="btn btn-primary mt-5">Ver mais</a>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.property-delete').click(function(event) {
                event.preventDefault();

                let propertyId = $(this).data('id');
                let deleteUrl = "{{ route('property.destroy', ['propertyId' => ':propertyId']) }}";
                deleteUrl = deleteUrl.replace(':propertyId', propertyId);

                Swal.fire({
                    title: 'Tem certeza?',
                    text: 'Esta ação é irreversível!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, apagar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire("Sucesso", "Cliente deletado com sucesso",
                                    "success");
                                location.reload();
                            },
                            error: function() {
                                Swal.fire('Erro',
                                    'Ocorreu um erro ao excluir o cliente', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
