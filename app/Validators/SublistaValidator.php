<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SublistaValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'nome' =>  'required' ,
            'lista_id' =>  'required' ,

        ],
        ValidatorInterface::RULE_UPDATE => [
			'nome' =>  'required' ,
            'lista_id' =>  'required' ,
		],
   ];

}
