@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Clientes</div>
                    <div class="card-body">
                        <a href="{{ route('customer.create') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar novo
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Profissão</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->cpf }}</td>
                                            <td>{{ $customer->profession }}</td>
                                            <td>
                                                <a href="{{ route('customer.edit', ['customerId' => $customer->id]) }}"
                                                    title="Edit User"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Editar</button></a>

                                                <form method="POST" action="" accept-charset="UTF-8"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm customer-delete"
                                                        data-id="{{ $customer->id }}" title="Delete User">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Apagar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.customer-delete').click(function(event) {
                event.preventDefault();

                let customerId = $(this).data('id');
                let deleteUrl = "{{ route('customer.destroy', ['customerId' => ':customerId']) }}";
                deleteUrl = deleteUrl.replace(':customerId', customerId);

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
