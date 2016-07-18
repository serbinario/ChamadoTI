<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lista extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'lista';

    protected $fillable = [ 
		'id',
		'nome',
	];

    public function chamado()
    {
        return $this->hasMany(Sublista::class, "lista_id");
    }
    

}