<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Chamado extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'chamado';

    protected $fillable = [ 
		'codigo',
		'data',
		'descricao',
		'responsavel',
		'sublista_id',
		'departamento_id',
		'users_id'
	];

	public function departamento()
	{
		return $this->belongsTo(Departamento::class, "departamento_id");
	}

	public function sublista()
	{
		return $this->belongsTo(Sublista::class, "sublista_id");
	}

	public function user()
	{
		return $this->belongsTo(User::class, "users_id");
	}
	
}