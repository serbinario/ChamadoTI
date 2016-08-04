<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('data', 'Data') !!}
                    {!! Form::text('data', Session::getOldInput('data')  , array('class' => 'form-control date datepicker')) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('departamento_id', 'Departamento') !!}
                    {!! Form::select('departamento_id', $loadFields['departamento'], null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    {!! Form::label('responsavel', 'Responsável') !!}
                    {!! Form::text('responsavel', Session::getOldInput('responsavel')  , array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('lista', 'Lista') !!}
                    {!! Form::select('lista', (['' => 'Selecione uma lista'] + $loadFields['lista']->toArray()), null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('sublista_id', 'Sublista') !!}
                    @if(isset($model->sublista->id))
                        {!! Form::select('sublista_id', array($model->sublista->id => $model->sublista->nome), $model->sublista->id,array('class' => 'form-control', 'id' => 'sublista')) !!}
                    @else
                        {!! Form::select('sublista_id', array(), Session::getOldInput('sublista_id'),array('class' => 'form-control', 'id' => 'sublista')) !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('descricao', 'Descrição') !!}
                    {!! Form::textarea('descricao', Session::getOldInput('descricao')  ,['size' => '86x5'] , array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    {{--Buttons Submit e Voltar--}}
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="{{ route('serbinario.chamado.index') }}" class="btn btn-primary btn-block"><i
                            class="fa fa-long-arrow-left"></i> Voltar</a></div>
            <div class="btn-group">
                {!! Form::submit('Salvar', array('class' => 'btn btn-primary btn-block')) !!}
            </div>
        </div>
    </div>
</div>
@section('javascript')
    <script src="{{ asset('/js/validacoes/validation_form_chamado.js') }}"></script>

    <script type="text/javascript">
        //Carregando as cidades
        $(document).on('change', "#lista", function () {

            //Removendo as Bairros
            $('#sublista option').remove();

            //Recuperando o estado
            var lista = $(this).val();

            if (lista !== "") {
                var dados = {
                    'table' : 'sublista',
                    'field_search' : 'lista_id',
                    'value_search': lista,
                };

                jQuery.ajax({
                    type: 'POST',
                    url: '{{ route('serbinario.util.search')  }}',
                    data: dados,
                    datatype: 'json',
                    headers: {
                        'X-CSRF-TOKEN' : '{{  csrf_token() }}'
                    },
                }).done(function (json) {
                    var option = "";

                    option += '<option value="">Selecione uma sublista</option>';
                    for (var i = 0; i < json.length; i++) {
                        option += '<option value="' + json[i]['id'] + '">' + json[i]['nome'] + '</option>';
                    }

                    $('#sublista option').remove();
                    $('#sublista').append(option);
                });
            }
        });
    </script>
@stop