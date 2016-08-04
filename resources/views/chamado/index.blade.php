@extends('menu')

@section('css')
    <style type="text/css" class="init">
        td.details-control {
            background: url({{asset("/imagemgrid/icone-produto-plus.png")}}) no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url({{asset("/imagemgrid/icone-produto-minus.png")}}) no-repeat center center;
        }


        a.visualizar {
            background: url({{asset("/imagemgrid/impressao.png")}}) no-repeat 0 0;
            width: 23px;
        }

        td.bt {
            padding: 10px 0;
            width: 126px;
        }

        td.bt a {
            float: left;
            height: 22px;
            margin: 0 10px;
        }
        .highlight {
            background-color: #FE8E8E;
        }
    </style>
@endsection

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="col-md-10">
                <h4>
                    <i class="fa fa-users"></i>
                    Listar Chamados
                </h4>
            </div>
            <div class="col-md-2">
                <a href="{{ route('serbinario.chamado.create')}}" class="btn-sm btn-primary">Nova Empresa</a>
            </div>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive no-padding">
                        <table id="chamado-grid" class="display table table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Detalhe</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Departamento</th>
                                <th>Responsável</th>
                                <th>Lista</th>
                                <th>Sublista</th>
                                <th>Data</th>
                                <th>Acão</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Detalhe</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Departamento</th>
                                <th>Responsável</th>
                                <th>Lista</th>
                                <th>Sublista</th>
                                <th>Data</th>
                                <th style="width: 17%;">Acão</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
