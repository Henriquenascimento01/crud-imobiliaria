@extends('layouts.main')


@section('content')
    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" placeholder="Nome" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Profissão</label>
                <input type="text" class="form-control" placeholder="Profissão" name="profession">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputPassword1">CPF</label>
                    <input type="text" class="form-control" placeholder="CPF" name="cpf">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('js/clients/create/clientTypeSelect.js') }}"></script>
    <script src="{{ asset('js/clients/create/getZipcodeInfo.js') }}"></script>
    <script src="{{ asset('js/clients/create/checkIfEmailsExists.js') }}"></script>
    <script src="{{ asset('js/clients/create/checkIfCpfExists.js') }}"></script>
    <script src="{{ asset('js/clients/create/checkIfCnpjExistsAndGetInfo.js') }}"></script>
@endsection
