<?php

namespace Serbinario\Services;

use Serbinario\Repositories\ContratoRepository;
use Serbinario\Entities\Contrato;
use Serbinario\Repositories\ServicoRepository;

class ContratoService
{
    /**
     * @var ContratoRepository
     */
    private $repository;

    /**
     * @var ServicoRepository
     */
    private $repositoryService;

    /**
     * @param ContratoRepository $repository
     */
    public function __construct(ContratoRepository $repository, ServicoRepository $repositoryService)
    {
        $this->repository = $repository;
        $this->repositoryService = $repositoryService;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {

        $relacionamento = [
            'subservico.servico',
            'fornecedor'
        ];

        #Recuperando o registro no banco de dados
        $contrato = $this->repository->with($relacionamento)->find($id);

        #Verificando se o registro foi encontrado
        if(!$contrato) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $contrato;
    }
    
    public function servicos()
    {
        $servicos = $this->repositoryService->with('subservicos')->all();
        
        return $servicos;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Contrato
    {

        $data = $this->tratamentoCampos($data);
        
        $dataObj = new \DateTime('now');
        $data['data_contrato'] = $dataObj->format('Y-m-d');
        $data['codigo'] = $dataObj->format('YmdHis');
        
        #Salvando o registro pincipal
        $contrato =  $this->repository->create($data);

        #adiciona os subserviços
        $contrato->subservico()->attach($data['subservicos']);

        #Verificando se foi criado no banco de dados
        if(!$contrato) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $contrato;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Contrato
    {

        $data = $this->tratamentoCampos($data);
        
        #Atualizando no banco de dados
        $contrato = $this->repository->update($data, $id);
        $findContrato = $this->find($id);

        #destroi todos os subserviços
        $contrato->subservico()->detach($findContrato->subservico->lists('id')->all());

        #adiciona novamente os subserviços
        $contrato->subservico()->attach($data['subservicos']);

        #Verificando se foi atualizado no banco de dados
        if(!$contrato) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $contrato;
    }

    /**
     * @param array $models
     * @return array
     */
    public function load(array $models) : array
    {
        #Declarando variáveis de uso
        $result = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            #qualificando o namespace
            $nameModel = "Serbinario\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::lists('nome', 'id');
        }

        #retorno
        return $result;
    }

    /**
     * @param array $models
     * @return array
     */
    public function loadFornecedor(array $models) : array
    {
        #Declarando variáveis de uso
        $result = [];

        #Criando e executando as consultas
        foreach ($models as $model) {
            #qualificando o namespace
            $nameModel = "Serbinario\\Entities\\$model";

            #Recuperando o registro e armazenando no array
            $result[strtolower($model)] = $nameModel::lists('nome_fantasia', 'id');
        }

        #retorno
        return $result;
    }

    /**
     * @param $data
     * @return mixed
     */
    private function tratamentoCampos($data)
    {
        #tratamento de datas do aluno
        $data['data_pagamento']           = $this->convertDate($data['data_pagamento'], 'en');

        //$data['data_exame_nacional_um']   = $this->convertDate($data['data_exame_nacional_um'], 'pt-BR');
        //$data['data_exame_nacional_dois'] = $this->convertDate($data['data_exame_nacional_dois'], 'pt-BR');
        # Tratamento de campos de chaves estrangeira
        foreach ($data as $key => $value) {
            $explodeKey = explode("_", $key);
            if ($explodeKey[count($explodeKey) -1] == "id" && $value == null ) {
                $data[$key] = null;
            }
        }
        #retorno
        return $data;
    }
    /**
     * @param $date
     * @return bool|string
     */
    public function convertDate($date, $format)
    {
        #declarando variável de retorno
        $result = "";
        #convertendo a data
        if (!empty($date) && !empty($format)) {
            #Fazendo o tratamento por idioma
            switch ($format) {
                case 'pt-BR' : $result = date_create_from_format('Y-m-d', $date); break;
                case 'en'    : $result = date_create_from_format('d/m/Y', $date); break;
            }
        }
        #retorno
        return $result;
    }
    /**
     * @param Aluno $aluno
     */
    public function getWithDateFormatPtBr($model)
    {
        #validando as datas
        $model->data_pagamento   = $model->data_pagamento == '0000-00-00' ? "" : $model->data_pagamento;

        #tratando as datas
        $model->data_pagamento   = date('d/m/Y', strtotime($model->data_pagamento));

        //$aluno->data_exame_nacional_um   = date('d/m/Y', strtotime($aluno->data_exame_nacional_um));
        //$aluno->data_exame_nacional_dois = date('d/m/Y', strtotime($aluno->data_exame_nacional_dois));
        #return
        return $model;
    }
}