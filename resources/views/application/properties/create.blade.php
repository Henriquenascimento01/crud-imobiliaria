@extends('layouts.main')

@section('content')
    <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="property_photo">Foto do Imóvel</label>
                <input type="file" class="form-control" id="property_photo" name="property_photo">
            </div>
            <div class="form-group">
                <label for="property_name">Nome do Imóvel</label>
                <input type="text" class="form-control" placeholder="Nome do Imóvel" id="property_name"
                    name="property_name">
            </div>
            <div class="form-group">
                <label for="address_street">Rua</label>
                <input type="text" class="form-control" placeholder="Rua" id="address_street" name="address_street">
            </div>
            <div class="form-group">
                <label for="address_number">Número</label>
                <input type="text" class="form-control" placeholder="Número" id="address_number" name="address_number">
            </div>
            <div class="form-group">
                <label for="address_complement">Complemento</label>
                <input type="text" class="form-control" placeholder="Complemento" id="address_complement"
                    name="address_complement">
            </div>
            <div class="form-group">
                <label for="address_city">Cidade</label>
                <input type="text" class="form-control" placeholder="Cidade" id="address_city" name="address_city">
            </div>
            <div class="form-group">
                <label for="address_state">Estado</label>
                <input type="text" class="form-control" placeholder="Estado" id="address_state" name="address_state">
            </div>
            <div class="form-group">
                <label for="address_zip_code">CEP</label>
                <input type="text" class="form-control" placeholder="CEP" id="address_zip_code" name="address_zip_code">
            </div>
            <div class="form-group">
                <label for="user_id">Propetário</label>
                <select class="form-control" id="customer_id" name="customer_id">
                    <option value="">Selecione</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" id="send-customer-data" class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

@section('scripts')
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#address_zip_code").mask("99.999-999");
        });

        $('#send-customer-data').click(function(event) {
            event.preventDefault();

            let isValid = true;

            if ($("#property_photo").val() == "") {
                $("#property_photo").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#property_photo").css('border', '');
            }

            if ($("#property_name").val() == "") {
                $("#property_name").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#property_name").css('border', '');
            }

            if ($("#address_street").val() == "") {
                $("#address_street").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#address_street").css('border', '');
            }

            if ($("#address_number").val() == "") {
                $("#address_number").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#address_number").css('border', '');
            }

            if ($("#address_city").val() == "") {
                $("#address_city").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#address_city").css('border', '');
            }

            if ($("#address_state").val() == "") {
                $("#address_state").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#address_state").css('border', '');
            }

            if ($("#address_zip_code").val() == "") {
                $("#address_zip_code").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#address_zip_code").css('border', '');
            }

            if ($("#customer_id").val() == "") {
                $("#customer_id").css('border', '2px solid red');
                isValid = false;
            } else {
                $("#customer_id").css('border', '');
            }

            if (!isValid) {
                Swal.fire("Erro", "Todos os campos são obrigatórios", "error");
            } else {
                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('property_photo', $("#property_photo")[0].files[0]);
                formData.append('property_name', $("#property_name").val());
                formData.append('address_street', $("#address_street").val());
                formData.append('address_number', $("#address_number").val());
                formData.append('address_complement', $("#address_complement").val());
                formData.append('address_city', $("#address_city").val());
                formData.append('address_state', $("#address_state").val());
                formData.append('address_zip_code', $("#address_zip_code").val());
                formData.append('customer_id', $("#customer_id").val());

                $.ajax({
                    url: '/property/store',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire("Sucesso", "Imovél cadastrado com sucesso", "success");
                        $("#cpf").val('');
                        $("#name").val('');
                        $("#profession").val('');
                    },
                    error: function() {
                        Swal.fire("Erro", "Ocorreu um erro ao cadastrar o imovél", "error");
                    }
                });
            }

            return isValid;
        });
    </script>
@endsection


<script src="{{ asset('js/clients/create/clientTypeSelect.js') }}"></script>
<script src="{{ asset('js/clients/create/getZipcodeInfo.js') }}"></script>
<script src="{{ asset('js/clients/create/checkIfEmailsExists.js') }}"></script>
<script src="{{ asset('js/clients/create/checkIfCpfExists.js') }}"></script>
<script src="{{ asset('js/clients/create/checkIfCnpjExistsAndGetInfo.js') }}"></script>
@endsection
