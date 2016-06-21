<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Servico extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'servico';

    protected $fillable = [ 
		'nome',
	];

    public function subservicos()
    {
        return $this->hasMany(Subservico::class, 'servico_id', 'id');
    }
}