<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pessoa extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'pessoa';

    protected $fillable = [ 
		'nome',
	];

}