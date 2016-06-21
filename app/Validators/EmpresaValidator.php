<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EmpresaValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'nome' =>  '' ,
			'cpnj' =>  '' ,
			'endereco_id' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}
