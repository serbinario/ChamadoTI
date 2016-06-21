<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contrato extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'contrato';

    protected $fillable = [
		'fornecedor_id',
        'qtd_funcionarios',
        'qtd_notas_fiscais',
        'qtd_lancamentos_contabeis',
        'data_contrato',
        'foro_cidade',
        'valor_contrato',
        'data_pagamento',
        'codigo',
	];

    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function subservico() {
        return $this->belongsToMany(Subservico::class, 'subservico_contrato', 'contrato_id', "subservico_id");
    }

}