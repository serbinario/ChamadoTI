@extends('menu')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="col-sm-6 col-md-9">
                <h4>
                    <i class="material-icons"></i>
                    Serviços por listas
                </h4>
            </div>
        </div>
        <div class="ibox-content">
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        // Evento para carregar o relatório

        // Redirecionando
        // window.open('/index.php/seracademico/graduacao/curriculo/reportById/' + curriculoId,'_blank');

        // Requisição ajax
        jQuery.ajax({
            type: 'POST',
            url: '{{route('serbinario.graficos.listaAjax')}}',
            datatype: 'json'
        }).done(function (json) {
            //console.log(json);

            //var dados = [['Pagos', json.dados.pagos], ['Não Pagos', json.dados.nPagos], ['Totais', json.dados.totais]];
            reportBar(json);


        });


        // Função para formatar a label
        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; text-align:center; padding:3px; color:" + series.color +";'>" + label + "<br/>" + series.data[0][1] + "</div>"
        }

        // Função para carregar o gráfico de barras
        function reportBar(dados) {

            $.plot("#flot-bar-chart", [ dados ], {
                colors: ["#1ab394"],
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        fill: true,
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
                    show: false
                },
            });
        }
    </script>
@stop
