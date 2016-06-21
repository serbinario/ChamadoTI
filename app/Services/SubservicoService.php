<?php

namespace Serbinario\Services;

use Serbinario\Repositories\ServicoRepository;
use Serbinario\Repositories\SubservicoRepository;
use Serbinario\Entities\Subservico;

class SubservicoService
{
    /**
     * @var SubservicoRepository
     */
    private $repository;

    /**
     * @var ServicoRepository
     */
    private $repositoryServico;

    /**
     * SubservicoService constructor.
     * @param SubservicoRepository $repository
     * @param ServicoRepository $repositoryServico
     */
    public function __construct(SubservicoRepository $repository, ServicoRepository $repositoryServico)
    {
        $this->repository = $repository;
        $this->repositoryServico = $repositoryServico;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        #Recuperando o registro no banco de dados
        $subservico = $this->repository->find($id);

        #Verificando se o registro foi encontrado
        if(!$subservico) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $subservico;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Subservico
    {

        $subservicoArray = array();
        $subservico = null;

        for ($i = 0; $i < count($data['nome']); $i++) {
            $subservicoArray['servico_id'] = $data['servico_id'];
            $subservicoArray['nome'] = $data['nome'][$i];
            $subservico =  $this->repository->create($subservicoArray);
        }

        #Salvando o registro pincipal

        #Verificando se foi criado no banco de dados
        if(!$subservico) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $subservico;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Subservico
    {
        #Atualizando no banco de dados
        $subservico = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$subservico) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $subservico;
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