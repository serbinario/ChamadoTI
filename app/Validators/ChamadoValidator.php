<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ChamadoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'codigo' =>  '' ,
			'data' =>  '' ,
			'descricao' =>  '' ,
			'responsavel' =>  '' ,
			'sublista_id' =>  '' ,
			'departamento_id' =>  '' ,
			'updeted_at' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [
			'codigo' =>  '' ,
			'data' =>  '' ,
			'descricao' =>  '' ,
			'responsavel' =>  '' ,
			'sublista_id' =>  '' ,
			'departamento_id' =>  '' ,
			'updeted_at' =>  '' ,
		],
   ];

}
