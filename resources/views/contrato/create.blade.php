@extends('menu')


@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h4>
                <i class="fa fa-user"></i>
                Cadastrar Contrato
            </h4>
        </div>

        <div class="ibox-content">

            @if(Session::has('message'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <em> {!! session('message') !!}</em>
                </div>
            @endif

            @if(Session::has('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {!! Form::open(['route'=>'serbinario.contrato.store', 'method' => "POST", 'id' => 'formContrato', 'enctype' => 'multipart/form-data']) !!}
                @include('tamplatesForms.tamplateFormContrato')
            {!! Form::close() !!}
        </div>
    </div>

    @section('javascript')
        <script src="{{ asset('/js/validacoes/validation_form_contrato.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#tree-servicos").tree();

                //consulta via select2 segunda entrada 1
                $("#fornecedor").select2({
                    placeholder: 'Selecione um cliente/fornecedor',
                    minimumInputLength: 1,
                    width: 400,
                    ajax: {
                        type: 'POST',
                        url: "{{ route('serbinario.util.select2')  }}",
                        dataType: 'json',
                        delay: 250,
                        crossDomain: true,
                        data: function (params) {
                            return {
                                'search':     params.term, // search term
                                'tableName':  'fornecedor',
                                'columnSelect': 'nome_fantasia',
                                'fieldName':  'nome_fantasia',
                                'page':       params.page
                            };
                        },
                        headers: {
                            'X-CSRF-TOKEN' : '{{  csrf_token() }}'
                        },
                        processResults: function (data, params) {

                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;

                            return {
                                results: data.data,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        }
                    }
                });
            });
        </script>
    @stop
@stop
