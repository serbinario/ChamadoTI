<div class="row">
    <div class="col-md-10">
        <div class="row">
            <div class="form-group col-md-8">
                {!! Form::label('nome', 'Nome *') !!}
                {!! Form::text('nome', null, array('class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('nascimento', 'Nascimento ') !!}
                {!! Form::text('nascimento', null, array('class' => 'form-control datepicker')) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('sexo', 'Sexo ') !!}
                {!! Form::select('', array(), '', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {!! Form::label('curso', 'Curso') !!}
                {!! Form::select('curso',  array('1' => 'Curso'), array(),array('class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('turma', 'Turma ') !!}
                {!! Form::select('turma',  array('1' => 'Turma'), array(),array('class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('turno', 'Turno ') !!}
                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('currículo', 'Currículo') !!}
                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('matricula', 'Matrícula ') !!}
                {!! Form::text('', '', array('class' => 'form-control')) !!}
                <input type="hidden" value="" id="idAluno" name="idAluno">
            </div>
            <div class="form-group col-md-1">
                {!! Form::label('ativar', 'Ativar') !!}
                <div class="checkbox checkbox-primary">
                    {{--@if(!isset($cliente['id']))
                        <input type="checkbox" name="" checked id="status" value="">
                    @else
                        @if(isset($cliente['status']) && $cliente['status'] == true)
                            <input type="checkbox"  name="" checked id="status" value="{{$cliente['status']}}">
                        @else
                            <input type="checkbox" name="alunos[status]" id="status" value="">
                        @endif
                    @endif--}}
                    <label for="op1">  Ativar  </label>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-2">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 135px; height: 115px;">
                @if (isset($cliente['img']) && $cliente['img'] != null)
                    <div id="midias" >
                        <img id="logo"  src="" class="ajuste-img" alt="Foto"  height="300" width="150"/><br />
                        {{--<button type="button" class="btn btn-danger removerFoto">Remover Foto</button>--}}
                    </div>
                @endif
            </div>
            <div>
                <span class="btn btn-primary btn-xs btn-block btn-file">
                    <span class="fileinput-new">Selecionar</span>
                    <span class="fileinput-exists">Mudar</span>
                    <input type="file" name="img">
                    <input type="hidden" name="imgAtual" value="">
                </span>
                {{--<a href="#" class="btn btn-warning btn-xs fileinput-exists col-md-6" data-dismiss="fileinput">Remover</a>--}}
            </div>
        </div>
    </div>
</div>
<hr class="hr-line-dashed"/>
<div class="row">
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#dados" aria-controls="dados" data-toggle="tab"><i class="fa fa-male"></i>  Dados pessoais</a>
            </li>
            <li role="presentation">
                <a href="#contato" aria-controls="contato" role="tab" data-toggle="tab"><i class="fa fa-globe"></i>  Informações para contato</a>
            </li>
            <li role="presentation">
                <a href="#ensMedio" aria-controls="ensMedio" role="tab" data-toggle="tab"><i class="fa fa-file-text"></i>  Ensino Médio</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dados">
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-2">
                                {!! Form::label('estadoCivil', 'Estado Civil ') !!}
                                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('grauInstrucao', 'Grau de instrução') !!}
                                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('profissao', 'Profissão ') !!}
                                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('corRaca', 'Cor/Raça') !!}
                                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('tipoSanguineo', 'Tipo Sanguíneo') !!}
                                {!! Form::select('', array(), '', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                {!! Form::label('nacionalidade', 'Nacionalidade ') !!}
                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('ufNascimento', 'UF Nascimento') !!}
                                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('naturalidade', 'Naturalidade ') !!}
                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <legend><i class="fa fa-archive"></i> Outros dados</legend>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#filiacao"> <i class="fa fa-plus-circle"></i>  Filiação</a>
                                    </h4>
                                </div>
                                <div id="filiacao" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {!! Form::label('nomePai', 'Nome Pai ') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-6">
                                                {!! Form::label('nomeMae', 'Nome Mãe ') !!}
                                                {!! Form::text('','', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <i class="fa fa-plus-circle"></i>  Documentos</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                {!! Form::label('identidade', 'Identidade ') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('orgaoRG', 'Orgão RG ') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('ufExp', 'UF') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('dataExpedicao', 'Data expedição') !!}
                                                <?php
                                               /* if(isset($cliente['dataExpedicao'])) {
                                                    $date = explode('T', $cliente['dataExpedicao']);
                                                    $data = \DateTime::createFromFormat('Y-m-d', $date[0]);
                                                    $dataFromat = $data->format('d/m/Y');
                                                } else {
                                                    $dataFromat = "";
                                                }*/
                                                ?>
                                                {!! Form::text('', '', array('class' => 'form-control datepicker')) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                {!! Form::label('cpf', 'CPF *') !!}
                                                {!! Form::text('', '', array('class' => 'form-control cpf', 'id' => 'cpfAlunos')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('tituloEleitoral', 'Título Eleitoral') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-1">
                                                {!! Form::label('zona', 'Zona') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-1">
                                                {!! Form::label('secao', 'Seção') !!}
                                                {!! Form::text('', isset($cliente['secao']) ? $cliente['secao'] : "", array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('reservista', 'Reservista') !!}
                                                {!! Form::text('alunos[resevista]', isset($cliente['resevista']) ? $cliente['resevista'] : "", array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('categoriaReser', 'Categoria Reservista') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#deficiencia"> <i class="fa fa-plus-circle"></i>  Deficiencia</a>
                                    </h4>
                                </div>
                                <div id="deficiencia" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                {!! Form::label('deficiente', 'Deficiente? ') !!}
                                                {!! Form::select('', array(), '',array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-4">
                                                {!! Form::label('tipoDef', 'Tipo') !!}
                                                <div class="checkbox checkbox-primary">
                                                    <input type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label for="inlineCheckbox1">  Física  </label>
                                                    <div class="checkbox checkbox-primary checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox2" value="option2">
                                                        <label for="inlineCheckbox2">  Auditiva  </label>
                                                    </div>
                                                    <div class="checkbox checkbox-primary checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox3" value="option3">
                                                        <label for="inlineCheckbox3">  Visual  </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                {!! Form::label('outraDef', 'Outra') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="contato">
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-10">
                                {!! Form::label('endereco', 'Endereço ') !!}
                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('numero', 'Número') !!}
                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                {!! Form::label('uf', 'UF ') !!}
                                {!! Form::select('uf', array(), '', array('class' => 'form-control', 'id' => 'estado')) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('cidade', 'Cidade ') !!}
                                {!! Form::select('cidade', array(), '',array('class' => 'form-control', 'id' => 'cidade')) !!}
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::label('bairro', 'Bairro ') !!}
                                {!! Form::select('', array(), '',array('class' => 'form-control', 'id' => 'bairro')) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('cep', 'CEP ') !!}
                                {!! Form::text('', '', array('class' => 'form-control cep')) !!}
                            </div>
                        </div>
                        <legend><i class="fa fa-phone"></i> Contato</legend>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#contato1"> <i class="fa fa-plus-circle"></i>  Contato pessoal</a>
                                    </h4>
                                </div>
                                <div id="contato1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                {!! Form::label('email', 'E-mail') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('telFixo', 'Telefone fixo') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('celular', 'Celular') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('celular2', 'Celular 2') !!}
                                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#endprof"> <i class="fa fa-plus-circle"></i>  Contato profissional</a>
                                    </h4>
                                </div>
                                <div id="endprof" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                {!! Form::label('nomeEmp', 'Nome da empresa') !!}
                                                {!! Form::text('',"" , array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                {!! Form::label('uf', 'UF ') !!}
                                                {!! Form::select('ufPro', array(), '', array('class' => 'form-control', 'id' => 'estadoPro')) !!}
                                            </div>
                                            <div class="form-group col-md-4">
                                                {!! Form::label('cidade', 'Cidade ') !!}
                                                {!! Form::select('cidadePro', array(), '',array('class' => 'form-control', 'id' => 'cidadePro')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('bairro', 'Bairro ') !!}
                                                {!! Form::select('', array(), '',array('class' => 'form-control', 'id' => 'bairroPro')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('cepPro', 'CEP') !!}
                                                {!! Form::text('',"" , array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                {!! Form::label('emailInstitucional', 'E-mail institucional') !!}
                                                {!! Form::text('',"" , array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('telFixoPro', 'Telefone Fixo') !!}
                                                {!! Form::text('', "" , array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-2">
                                                {!! Form::label('celPro', 'Celular') !!}
                                                {!! Form::text('',"" , array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="ensMedio">
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label for="instituicao">Instituição</label>
                                <select id="instituicao" class="form-control">
                                    {{--@if(isset($cliente['instituicao']))
                                        <option value="{{ ''  }}" selected="selected">{{ ''  }}</option>
                                    @endif--}}
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('anoConlusao', 'Ano Conclusão') !!}
                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                {!! Form::label('outraEscola', 'Outra Escola') !!}
                                {!! Form::text('', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <i class="fa fa-play-circle"></i>   Exames</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {!! Form::label('1Exame', '1º Exame') !!}
                                                {!! Form::select('', array(), '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('data1', 'Data') !!}
                                                <?php
                                                /*if(isset($cliente['dataExameNacionalUm'])) {
                                                    $date3 = explode('T', $cliente['dataExameNacionalUm']);
                                                    $data3 = \DateTime::createFromFormat('Y-m-d', $date2[0]);
                                                    $dataFromat3 = $data3->format('d/m/Y');
                                                } else {
                                                    $dataFromat3 = "";
                                                }*/
                                                ?>
                                                {!! Form::text('', '', array('class' => 'form-control datepicker')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('nota1', 'Nota') !!}
                                                {!! Form::text('alunos[notaExameNacionalUm]', isset($cliente['notaExameNacionalUm']) ? $cliente['notaExameNacionalUm'] : "", array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {!! Form::label('2Exame', '2º Exame') !!}
                                                {!! Form::select('', array(), '', array('class' => 'form-control')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('data2', 'Data') !!}
                                                <?php
                                                /*if(isset($cliente['dataExameNacionalDois'])) {
                                                    $date4 = explode('T', $cliente['dataExameNacionalDois']);
                                                    $data4 = \DateTime::createFromFormat('Y-m-d', $date2[0]);
                                                    $dataFromat4 = $data4->format('d/m/Y');
                                                } else {
                                                    $dataFromat4 = "";
                                                }*/
                                                ?>
                                                {!! Form::text('', '', array('class' => 'form-control datepicker')) !!}
                                            </div>
                                            <div class="form-group col-md-3">
                                                {!! Form::label('nota2', 'Nota') !!}
                                                {!! Form::text('','', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10"></div>
    <div class="col-md-2">
        {!! Form::submit('Salvar', array('class' => 'btn btn-primary btn-block pull-right')) !!}
    </div>
</div>

</div>