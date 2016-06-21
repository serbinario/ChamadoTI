<div class="row">
	<div class="col-md-12">
		<div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#principal" aria-controls="principal" role="tab" data-toggle="tab">Dados principais</a></li>
                    <li role="presentation"><a href="#endereco" aria-controls="profile" role="endereco" data-toggle="tab">Endereço</a></li>
                    <li role="presentation"><a href="#responsavel" aria-controls="profile" role="responsavel" data-toggle="tab">Responsável</a></li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="principal">
                        <br/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('pessoa_id', 'Pessoa') !!}
                                    {!! Form::select('pessoa_id', $loadFields['pessoa'], Session::getOldInput('pessoa_id'),array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('tipo_id', 'Tipo') !!}
                                    {!! Form::select('tipo_id', $loadFields['tipo'], Session::getOldInput('tipo_id'),array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('situacao_id', 'Situacao') !!}
                                    {!! Form::select('situacao_id', $loadFields['situacao'], Session::getOldInput('situacao_id'),array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('razao_social', 'Razão social') !!}
                                    {!! Form::text('razao_social', Session::getOldInput('razao_social')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('nome_fantasia', 'Nome fantasia') !!}
                                    {!! Form::text('nome_fantasia', Session::getOldInput('nome_fantasia')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('caixa_postal', 'Caixa postal') !!}
                                    {!! Form::text('caixa_postal', Session::getOldInput('caixa_postal')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('tel_um', 'Telefone 1') !!}
                                    {!! Form::text('tel_um', Session::getOldInput('tel_um')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('tel_dois', 'Telefone 2') !!}
                                    {!! Form::text('tel_dois', Session::getOldInput('tel_dois')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('tel_tres', 'Telefone 3') !!}
                                    {!! Form::text('tel_tres', Session::getOldInput('tel_tres')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('fax', 'Fax') !!}
                                    {!! Form::text('fax', Session::getOldInput('fax')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('cnpj', 'CNPJ') !!}
                                    {!! Form::text('cnpj', Session::getOldInput('cnpj')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'E-mail') !!}
                                    {!! Form::text('email', Session::getOldInput('email')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('site', 'Site') !!}
                                    {!! Form::text('site', Session::getOldInput('site')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('insc_est', 'Insc. Est.') !!}
                                    {!! Form::text('insc_est', Session::getOldInput('insc_est')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('vencimento', 'Vencimento') !!}
                                    {!! Form::text('vencimento', Session::getOldInput('vencimento')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('insc_municipal', 'Insc. municipal') !!}
                                    {!! Form::text('insc_municipal', Session::getOldInput('insc_municipal')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('tipo_empresa_id', 'Tipo Empresa') !!}
                                    {!! Form::select('tipo_empresa_id', $loadFields['tipoempresa'], Session::getOldInput('tipo_empresa_id'),array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('controle_um', 'Controle 1') !!}
                                    {!! Form::text('controle_um', Session::getOldInput('controle_um')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('controle_dois', 'Controle 2') !!}
                                    {!! Form::text('controle_dois', Session::getOldInput('controle_dois')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="endereco">
                        <br/>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    {!! Form::label('logradouro', 'Logradouro') !!}
                                    {!! Form::text('endereco[endereco]', Session::getOldInput('endereco[endereco]')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('cep', 'CEP') !!}
                                    {!! Form::text('endereco[cep]', Session::getOldInput('endereco[cep]')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    {!! Form::label('cidade', 'Cidade') !!}
                                    {!! Form::select('endereco[cidade]', $loadFields['cidade'], Session::getOldInput('endereco[cidade]'),array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('bairro', 'Bairro') !!}
                                    {!! Form::text('endereco[bairro]', Session::getOldInput('endereco[cep]')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    {!! Form::label('uf', 'UF') !!}
                                    {!! Form::text('endereco[uf]', Session::getOldInput('endereco[uf]')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="responsavel">
                        <br/>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    {!! Form::label('responsavel', 'Responsável') !!}
                                    {!! Form::text('responsavel', Session::getOldInput('responsavel')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('cpf', 'CPF') !!}
                                    {!! Form::text('cpf', Session::getOldInput('cpf')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('rg', 'RG') !!}
                                    {!! Form::text('rg', Session::getOldInput('rg')  , array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		</div>
        {{--Buttons Submit e Voltar--}}
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="{{ route('serbinario.fornecedor.index') }}" class="btn btn-primary btn-block"><i
                                    class="fa fa-long-arrow-left"></i> Voltar</a></div>
                    <div class="btn-group">
                        {!! Form::submit('Salvar', array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                </div>
            </div>
        {{--Fim Buttons Submit e Voltar--}}
        </div>
	</div>
</div>