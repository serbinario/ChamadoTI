<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#parametro" aria-controls="parametro" role="tab"
                                                              data-toggle="tab">Parâmetros</a></li>
                    <li role="presentation"><a href="#servico" aria-controls="servico" role="tab" data-toggle="tab">Serviços/Subserviços</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="parametro">
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('fornecedor_id', 'Cliente') !!}
                                    {!! Form::select('fornecedor_id', $loadFields['fornecedor'], Session::getOldInput('fornecedor_id'),array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    {!! Form::hidden('qtd_funcionarios', 0) !!}
                                    {!! Form::checkbox('qtd_funcionarios', 1, null, array('class' => 'form-control')) !!}
                                    {!! Form::label('qtd_funcionarios', 'Quantidade de funcionário', false) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox checkbox-primary">
                                    {!! Form::hidden('qtd_notas_fiscais', 0) !!}
                                    {!! Form::checkbox('qtd_notas_fiscais', 1, null, array('class' => 'form-control')) !!}
                                    {!! Form::label('qtd_notas_fiscais', 'Quantidade de notas fiscais', false) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox checkbox-primary">
                                    {!! Form::hidden('qtd_lancamentos_contabeis', 0) !!}
                                    {!! Form::checkbox('qtd_lancamentos_contabeis', 1, null, array('class' => 'form-control')) !!}
                                    {!! Form::label('qtd_lancamentos_contabeis', 'Quantidade de lançamentos contábeis', false) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('foro_cidade', 'Foro da cidade') !!}
                                    {!! Form::text('foro_cidade', Session::getOldInput('foro_cidade')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('valor_contrato', 'Valor do contrato') !!}
                                    {!! Form::text('valor_contrato', Session::getOldInput('valor_contrato')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('data_pagamento', 'Data de pagamento') !!}
                                    {!! Form::text('data_pagamento', Session::getOldInput('data_pagamento')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="servico">
                        <br/>
                        <div id="tree-servicos">
                            <ul>
                                @if(isset($servicos))
                                    @foreach($servicos as $servico)
                                        <li>
                                            <input type='checkbox' id="checkbox-index-{{$servico['id']}}"> {{$servico['nome']}}
                                            <ul>
                                                @foreach($servico['subservicos'] as $subservico)
                                                    @if(isset($model) && \in_array($subservico['id'], $model->subservico->lists('id')->all()))
                                                        <li><input type="checkbox" name="subservicos[]" checked value="{{ $subservico['id']  }}"> {{ $subservico['nome'] }}</li>
                                                        <script type="text/javascript">document.getElementById("checkbox-index-{{$servico['id']}}").checked = true</script>
                                                    @else
                                                        <li><input type="checkbox" name="subservicos[]" value="{{ $subservico['id']  }}"> {{ $subservico['nome'] }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="{{ route('serbinario.contrato.index') }}" class="btn btn-primary btn-block"><i
                            class="fa fa-long-arrow-left"></i> Voltar</a></div>
            <div class="btn-group">
                {!! Form::submit('Salvar', array('class' => 'btn btn-primary btn-block')) !!}
            </div>
        </div>
    </div>
    {{--Fim Buttons Submit e Voltar--}}
</div>