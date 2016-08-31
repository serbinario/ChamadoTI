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
@stop

@section('javascript')
    <script type="text/javascript">

        $(document).ready(function(){
            function format(d) {

                var html = "";

                html += '<center><h5>Descrição</h5></center>';
                html += '<p style="text-align: justify">"'+d.descricao+'"</p>';

                return html;
            }

            var table = $('#chamado-grid').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{!! route('serbinario.chamado.grid') !!}",
                    method: 'POST'
                },
                "order": [[ 2, "asc" ]],
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           'chamado.codigo',
                        "defaultContent": ''
                    },
                    {data: 'codigo', name: 'chamado.codigo'},
                    {data: 'nome', name: 'users.name'},
                    {data: 'dep_nome', name: 'departamento.nome'},
                    {data: 'responsavel', name: 'chamado.responsavel'},
                    {data: 'lista_nome', name: 'lista.nome'},
                    {data: 'sublista_nome', name: 'sublista.nome'},
                    {data: 'data', name: 'chamado.data'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            // Add event listener for opening and closing details
            $('#chamado-grid tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });
        });


        /*//Seleciona uma linha
         $('#crud-grid tbody').on( 'click', 'tr', function () {
         if ( $(this).hasClass('selected') ) {
         $(this).removeClass('selected');
         }
         else {
         table.$('tr.selected').removeClass('selected');
         $(this).addClass('selected');
         }
         } );

         //Retonra o id do registro
         $('#crud-grid tbody').on( 'click', 'tr', function () {

         var rows = table.row( this ).data()

         console.log( rows.id );
         } );*/

    </script>
@stop