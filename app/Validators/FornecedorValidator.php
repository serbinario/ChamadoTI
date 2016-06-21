<?php

namespace Serbinario\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class FornecedorValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            
			'razao_social' =>  '' ,
			'nome_fantasia' =>  '' ,
			'caixa_postal' =>  '' ,
			'tel_um' =>  '' ,
			'tel_dois' =>  '' ,
			'tel_tres' =>  '' ,
			'fax' =>  '' ,
			'email' =>  '' ,
			'site' =>  '' ,
			'cnpj' =>  '' ,
			'insc_est' =>  '' ,
			'vencimento' =>  '' ,
			'insc_municipal' =>  '' ,
			'controle_um' =>  '' ,
			'controle_dois' =>  '' ,
			'pessoa_id' =>  '' ,
			'classe_id' =>  '' ,
			'tipo_id' =>  '' ,
			'tipo_empresa_id' =>  '' ,
			'endereco_id' =>  '' ,

        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];

}
