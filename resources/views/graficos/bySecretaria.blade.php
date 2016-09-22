@extends('menu')

@section('css')
    <style>
        .form-control, .single-line {
            background-color: #ffffff;
            background-image: none;
            border: 1px solid #e5e6e7;
            border-radius: 1px;
            color: inherit;
            display: block;
            font-size: 12px;
            height: 34px !important;
            padding: 3px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            width: 100%;
        }
    </style>
@stop

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="col-sm-6 col-md-9">
                <h4>
                    <i class="material-icons"></i>
                    Serviços por secretarias - chamados por período em mês - 2016
                </h4>
            </div>
        </div>
        <div class="ibox-content">
            <br><br>
            <div class="row">
                <div class="col-md-5">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select style="height: 34px" id="secretaria" name="secretaria" class="form-control">
                                        <option value="">Selecione uma secretaria</option>
                                        @foreach($secretarias as $secretaria)
                                            <option value="{{$secretaria->id}}">{{$secretaria->nome}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" id="search" type="button">Gerar </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12">
                    <div id="morris-one-line-chart"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">

        $(document).on('click', "#search", function(){

            var campo = $("#secretaria").val();

            var dados = {
                'campo': campo
            };

            if(campo) {
                // Requisição ajax
                jQuery.ajax({
                    type: 'POST',
                    url: '{{route('serbinario.graficos.graficoBySecretaria')}}',
                    datatype: 'json',
                    data: dados
                }).done(function (json) {

                    $("#morris-one-line-chart").html("");

                    Morris.Line({
                        element: 'morris-one-line-chart',
                        data: json,
                        xkey: 'year',
                        ykeys: ['value'],
                        resize: true,
                        lineWidth:4,
                        labels: ['Chamados'],
                        lineColors: ['#1ab394'],
                        pointSize:5,
                    });
                });
            }

        });
    </script>
@stop
