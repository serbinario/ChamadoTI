<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Departamento extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'departamento';

    protected $fillable = [ 
		'id',
		'nome',
	];

    public function chamado()
    {
        return $this->hasMany(Chamado::class, "departamento_id");
    }
    

}