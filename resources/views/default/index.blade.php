@extends('menu')

@section('content')

    <div class="row">
        @foreach($tops as $top)
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">{{$top->nome}}</span>
                        <h5>Chamados</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$top->qtd}}</h1>
                        {{--<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
                        <small>Total chamados</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Chamdos por período em mêses - Ano 2016 </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="morris-one-line-chart"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">

        $(function() {

            // Requisição ajax
            jQuery.ajax({
                type: 'POST',
                url: '{{route('serbinario.graficos.graficDashboard')}}',
                datatype: 'json'
            }).done(function (json) {
                console.log(json);

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
        });
    </script>
@stop