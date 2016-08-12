<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('/js/jquery-2.1.1.js')}}"></script>
    <style type="text/css" class="init">

        body {
            font-family: arial;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table , tr , td {
            font-size: small;
        }
    </style>
    <link href="" rel="stylesheet" media="screen">
</head>

<body>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    $.ajax({
        url: '{{route('serbinario.graficos.listaAjax')}}',
        type: 'POST',
        dataType: 'JSON',
        success: function (json) {
           // console.log(json);
            drawChart(json)
        }
    });

    function drawChart(json) {
        var data = google.visualization.arrayToDataTable(json);

        var options = {
            title: 'Lista',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<center>
    <div class="topo" style="">
        <center><img src="{{asset('/img/logosergestor.png')}}" style="width: 170px; height: 100px"></center>
    </div>
</center>

<center><h4>GRÁFICO DE CHAMADOS POR LISTA</h4></center>
<center>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</center>

</body>
</html>