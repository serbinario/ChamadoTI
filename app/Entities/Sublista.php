<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Sublista extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'sublista';

    protected $fillable = [ 
		'id',
		'nome',
        'lista_id',
	];

    public function chamado()
    {
        return $this->hasMany(Chamado::class, "sublista_id");
    }

    public function lista()
    {
        return $this->belongsTo(Lista::class, "lista_id");
    }
    

}