@extends('menu')


@section('css')
    <style type="text/css" class="init">
        .DocumentList
        {
            overflow-x:scroll;
            overflow-y:hidden;
            height:200px;
            width:100%;
            padding: 0 15px;
        }

        .DocumentItem
        {
            border:1px solid black;
            padding:0;
            height:200px;
        }
    </style>
@endsection

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="col-sm-6 col-md-9">
                <h4>
                    <i class="material-icons"></i>
                    Serviços por departamento
                </h4>
            </div>
        </div>
        <div class="ibox-content">
            <br><br>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading"> </div>
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart7"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        // Evento para carregar o relatório

        var options = {
            colors: ["#1ab394"],
            series: {
                bars: {
                    show: true,
                    barWidth: 0.6,
                    fill: true,
                    horizontal: false,
                    fillColor: {
                        colors: [{
                            opacity: 0.8
                        }, {
                            opacity: 0.8
                        }]
                    }
                }
            },
            xaxis: {
                mode: "categories",
                tickLength: 0
            },
            grid: {
                color: "#999999",
                hoverable: true,
                clickable: true,
                tickColor: "#D4D4D4",
                borderWidth:0
            },
            legend: {
                show: true
            },
        };

            // Requisição ajax
            jQuery.ajax({
                type: 'POST',
                url: '{{route('serbinario.graficos.departamentoAjax')}}',
                datatype: 'json'
            }).done(function (json) {
             console.log(json);

                reportBar1(json[0]);
                reportBar2(json[1]);
                reportBar3(json[2]);
                reportBar4(json[3]);
                reportBar5(json[4]);
                reportBar6(json[5]);
                reportBar7(json[6]);
            });


        // Função para formatar a label
        function labelFormatter(label, series) {
            //console.log(series.data)
            return "<div style='font-size:8pt; text-align:center; padding:3px; color:" + series.color +";'>" + label + "<br/>" + series.data[0][1] + "</div>"
        }

        // Função para carregar o gráfico de barras
        function reportBar1(dados) {
            $.plot("#flot-bar-chart1", [ dados ], options);
        };

        function reportBar2(dados) {
            $.plot("#flot-bar-chart2", [ dados ], options);
        };

        function reportBar3(dados) {
            $.plot("#flot-bar-chart3", [ dados ], options);
        };

        function reportBar4(dados) {
            $.plot("#flot-bar-chart4", [ dados ], options);
        };

        function reportBar5(dados) {
            $.plot("#flot-bar-chart5", [ dados ], options);
        };

        function reportBar6(dados) {
            $.plot("#flot-bar-chart6", [ dados ], options);
        };

        function reportBar7(dados) {
            $.plot("#flot-bar-chart7", [ dados ], options);
        };
    </script>
@stop
