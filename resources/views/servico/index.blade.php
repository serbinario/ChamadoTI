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
                    Listar Serviços
                </h4>
            </div>
            <div class="col-md-2">
                <a href="{{ route('serbinario.servico.create')}}" class="btn-sm btn-primary">Novo Servico</a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <em> {!! session('message') !!}</em>
                    </div>
                @endif

                    @if(Session::has('warning'))
                        <div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <em> {!! session('warning') !!}</em>
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

                <div class="col-md-12">
                    <div class="table-responsive no-padding">
                        <table id="servico-grid" class="display table table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Detalhe</th>
                                <th>Nome</th>
                                <th>Acão</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th style="width: 3%;">Detalhe</th>
                                <th>Nome</th>
                                <th style="width: 17%;">Acão</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Cadastrar Subserviço</h4>
                        </div>
                        {!! Form::open(['route'=>'serbinario.subservico.store', 'method' => "POST", 'id' => 'formAluno']) !!}
                            <div class="modal-body">
                                <div class="input-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input class="form-control" id="nome" type="text">
                                    <input class="form-control" id="idServico" name="servico_id" type="hidden">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" id="addSubservivo"
                                                style="padding: 2px 12px; margin-top: 24px;"
                                                type="button">Adicionar </button>
                                    </span>
                                </div>
                                <br/><br/>
                                <table class="table table-bordered" id="subservicos-table">
                                    <thead>
                                    <tr>
                                        <td>Subserviços</td>
                                        <td style="width: 7%;">Ação</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- END Modal -->
        </div>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">

        $(document).ready(function(){

            function format(d) {

                var html = "<table class='table table-bordered'>";
                html += "<tr>";
                html += "<td><center><b>Subserviços</b></center></td>";
                html += "</tr>";

                for (var i = 0; i < d['subservicos'].length; i++){
                    html += "<tr>";
                    html += "<td>" + d['subservicos'][i]['nome']+ "</td>";
                    html += "</tr>";
                }

                html += "</table>";

                return html;
            }

            var table = $('#servico-grid').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('serbinario.servico.grid') !!}",
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           '',
                        "defaultContent": ''
                    },
                    {data: 'nome', name: 'nome'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            // Add event listener for opening and closing details
            $('#servico-grid tbody').on('click', 'td.details-control', function () {
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


            //Retonra o id do registro
            $(document).on('click', '#subservico', function () {

                var rows = table.row($(this).parent().parent().index()).data();

                 $('#idServico').val(rows.id);

            });
        });

        //Adicionar subserviços na table
        $(document).on('click', '#addSubservivo', function () {
            var nome = $('#nome').val();
            var html = "";

            html += '<tr>';
            html += '<td>'+nome+'' +
                    '<input type="hidden" name="nome[]" value="'+nome+'"></td>';
            html += '<td><button type="button" onclick="RemoveTableRow(this)" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i>Remover </button></td>';
            html += '</tr>';

            $('#subservicos-table tbody').append(html);
            $('#nome').val("");
        });


        //Excluir tr da tabela
        (function ($) {
            RemoveTableRow = function (handler) {
                var tr = $(handler).closest('tr');
                tr.fadeOut(400, function () {
                    tr.remove();
                });
                return false;
            };
        })(jQuery);

        //Seleciona uma linha
        /* $('#servico-grid tbody').on('click', 'tr', function () {
         if ($(this).hasClass('selected')) {
         $(this).removeClass('selected');
         }
         else {
         table.$('tr.selected').removeClass('selected');
         $(this).addClass('selected');
         }
         });*/


    </script>
@stop
