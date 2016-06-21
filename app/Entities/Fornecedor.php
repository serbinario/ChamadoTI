<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Fornecedor extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'fornecedor';

    protected $fillable = [ 
		'razao_social',
		'nome_fantasia',
		'caixa_postal',
		'tel_um',
		'tel_dois',
		'tel_tres',
		'fax',
		'email',
		'site',
		'cnpj',
		'insc_est',
		'vencimento',
		'insc_municipal',
		'controle_um',
		'controle_dois',
		'pessoa_id',
		'classe_id',
		'tipo_id',
		'tipo_empresa_id',
		'endereco_id',
		'situacao_id',
		'responsavel',
		'cpf',
		'rg'
	];

	public function pessoa()
	{
		return $this->belongsTo(Pessoa::class, 'pessoa_id');
	}

	public function situacao()
	{
		return $this->belongsTo(Situacao::class, 'situacao_id');
	}

	public function tipo()
	{
		return $this->belongsTo(Tipo::class, 'tipo_id');
	}

	public function tipoEmpresa()
	{
		return $this->belongsTo(TipoEmpresa::class, 'tipo_empresa_id');
	}

	public function endereco()
	{
		return $this->belongsTo(Endereco::class, 'endereco_id');
	}

}