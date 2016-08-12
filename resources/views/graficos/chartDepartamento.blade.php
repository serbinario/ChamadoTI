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
        url: '{{route('serbinario.graficos.departamentoAjax')}}',
        type: 'POST',
        dataType: 'JSON',
        success: function (json) {
           // console.log(json);
            drawChart(json)
        }
    });

    function drawChart(json) {

        var data = google.visualization.arrayToDataTable(json);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Departamentos",
            width: 600,
            height: 600,
            bar: {groupWidth: "80%"},
            legend: { position: "none" },
        };

        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
</script>
<center>
    <div class="topo" style="">
        <center><img src="{{asset('/img/logosergestor.png')}}" style="width: 170px; height: 100px"></center>
    </div>
</center>

<center><h4>GRÁFICO CHAMADOS POR DEPARTEMENTO</h4></center>
<center>
    <div id="barchart_values" style="width: 100%; height: 100px; margin-top: -20px"></div>
</center>

</body>
</html>