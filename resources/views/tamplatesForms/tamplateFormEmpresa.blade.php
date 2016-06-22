<div class="row">
	<div class="col-md-12">
		<div class="row">
            <div class="col-md-8">
                <div class="form-group">
				{!! Form::label('nome', 'Nome') !!}
				{!! Form::text('nome', Session::getOldInput('nome')  , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
				{!! Form::label('cpnj', 'CNPJ') !!}
				{!! Form::text('cpnj', Session::getOldInput('cpnj')  , array('class' => 'form-control')) !!}
                </div>
            </div>
		</div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label('insc_est', 'Logradouro') !!}
                    {!! Form::text('endereco[endereco]', Session::getOldInput('endereco[endereco]')  , array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('insc_est', 'CEP') !!}
                    {!! Form::text('endereco[cep]', Session::getOldInput('endereco[cep]')  , array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {!! Form::label('estado', 'UF ') !!}
                @if(isset($model->endereco->bairro->cidade->estado->id))
                    {!! Form::select('estado', $loadFields['estado'], $model->endereco->bairro->cidade->estado->id, array('class' => 'form-control', 'id' => 'estado')) !!}
                @else
                    {!! Form::select('estado', $loadFields['estado'], Session::getOldInput('estado'), array('class' => 'form-control', 'id' => 'estado')) !!}
                @endif
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('cidade', 'Cidade ') !!}
                @if(isset($model->endereco->bairro->cidade->id))
                    {!! Form::select('cidade', array($model->endereco->bairro->cidade->id => $model->endereco->bairro->cidade->nome), $model->endereco->bairro->cidade->id,array('class' => 'form-control', 'id' => 'cidade')) !!}
                @else
                    {!! Form::select('cidade', array(), Session::getOldInput('cidade'),array('class' => 'form-control', 'id' => 'cidade')) !!}
                @endif
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('endereco[bairros_id]', 'Bairro ') !!}
                @if(isset($model->endereco->bairro->id))
                    {!! Form::select('endereco[bairros_id]', array($model->endereco->bairro->id => $model->endereco->bairro->nome), $model->endereco->bairro->id,array('class' => 'form-control', 'id' => 'bairro')) !!}
                @else
                    {!! Form::select('endereco[bairros_id]', array(), Session::getOldInput('bairro'),array('class' => 'form-control', 'id' => 'bairro')) !!}
                @endif
            </div>
        </div>
	</div>
    {{--Buttons Submit e Voltar--}}
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <a href="{{ route('serbinario.empresa.index') }}" class="btn btn-primary btn-block"><i
                            class="fa fa-long-arrow-left"></i> Voltar</a></div>
            <div class="btn-group">
                {!! Form::submit('Salvar', array('class' => 'btn btn-primary btn-block')) !!}
            </div>
        </div>
    </div>
    {{--Fim Buttons Submit e Voltar--}}
</div>