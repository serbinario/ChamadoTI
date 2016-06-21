<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContratoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'fornecedor_id' =>  '' ,
            'qtd_funcionarios' =>  '' ,
            'qtd_notas_fiscais' =>  '' ,
            'qtd_lancamentos_contabeis' =>  '' ,
            'data_contrato' =>  '' ,
            'foro_cidade' =>  '' ,
            'valor_contrato' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}
