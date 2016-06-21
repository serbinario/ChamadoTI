<?php

namespace Serbinario\Services;

use Serbinario\Repositories\ServicoRepository;
use Serbinario\Entities\Servico;

class ServicoService
{
    /**
     * @var ServicoRepository
     */
    private $repository;

    /**
     * @param ServicoRepository $repository
     */
    public function __construct(ServicoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        #Recuperando o registro no banco de dados
        $servico = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$servico) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $servico;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Servico
    {
        #Salvando o registro pincipal
        $servico =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$servico) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $servico;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Servico
    {
        #Atualizando no banco de dados
        $servico = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$servico) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $servico;
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
}