<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ListaValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'nome' =>  'required' ,

        ],
        ValidatorInterface::RULE_UPDATE => [
			'nome' =>  'required' ,
		],
   ];

}
