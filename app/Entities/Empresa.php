<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Empresa extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'empresa';

    protected $fillable = [ 
		'nome',
		'cpnj',
		'endereco_id',
	];

	public function endereco()
	{
		return $this->belongsTo(Endereco::class, 'endereco_id');
	}

}