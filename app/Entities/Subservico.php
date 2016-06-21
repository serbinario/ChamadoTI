<?php

namespace Serbinario\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Subservico extends Model implements Transformable
{
    use TransformableTrait;

    protected $table    = 'subservico';

    protected $fillable = [ 
		'nome',
		'servico_id',
	];
    
    public function servico() {
        return $this->belongsTo(Servico::class, 'servico_id');
    }

    public function contratos() {
        return $this->belongsToMany(Contrato::class, 'subservico_contrato', 'subservico_id', "contrato_id");
    }

}