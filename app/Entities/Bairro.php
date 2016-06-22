<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Bairro extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'bairros';

    protected $fillable = [ 
		'cidades_id',
		'nome',
	];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, "bairros_id");
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, "cidades_id");
    }

}