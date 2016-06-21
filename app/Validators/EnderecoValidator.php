<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EnderecoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'endereco' =>  '' ,
			'bairro' =>  '' ,
			'uf' =>  '' ,
			'cep' =>  '' ,
			'cidade_id' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}
