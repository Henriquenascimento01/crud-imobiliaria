@extends('layouts.main')


@section('content')
    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" placeholder="Nome" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Profissão</label>
                <input type="text" class="form-control" placeholder="Profissão" id="profession" name="profession">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputPassword1">CPF</label>
                    <input type="text" class="form-control" placeholder="CPF" id="cpf" name="cpf">
                </div>
            </div>
            <button type="submit" id="send-customer-data" class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#cpf").mask("999.999.999-99");

        });

        // ...

        $('#send-customer-data').click(function(event) {
            event.preventDefault();

            let isValid = true;

            if ($("#cpf").val() == "") {
                $("#cpf").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#cpf").css('border', '');
            }

            if ($("#name").val() == "") {
                $("#name").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#name").css('border', '');
            }

            if ($("#profession").val() == "") {
                $("#profession").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#profession").css('border', '');
            }

            if (!isValid) {
                Swal.fire("Erro", "Todos os campos são obrigatórios", "error");
            } else {
                let formData = $('form').serialize(); 

                $.ajax({
                    url: '/customer/store',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire("Sucesso", "Cliente cadastrado com sucesso", "success");
                        $("#cpf").val('');
                        $("#name").val('');
                        $("#profession").val('');
                    },
                    error: function() {
                        Swal.fire("Erro", "Ocorreu um erro ao cadastrar o cliente", "error");
                    }
                });
            }

            return isValid;
        });
    </script>

    <script src="{{ asset('js/clients/create/clientTypeSelect.js') }}"></script>
    <script src="{{ asset('js/clients/create/getZipcodeInfo.js') }}"></script>
    <script src="{{ asset('js/clients/create/checkIfEmailsExists.js') }}"></script>
    <script src="{{ asset('js/clients/create/checkIfCpfExists.js') }}"></script>
    <script src="{{ asset('js/clients/create/checkIfCnpjExistsAndGetInfo.js') }}"></script>
@endsection
