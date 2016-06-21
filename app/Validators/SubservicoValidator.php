<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SubservicoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'nome' =>  '' ,
			'servico_id' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}
