<?php

namespace Serbinario\Services;

use Serbinario\Repositories\EmpresaRepository;
use Serbinario\Entities\Empresa;
use Serbinario\Repositories\EnderecoRepository;

class EmpresaService
{
    /**
     * @var EmpresaRepository
     */
    private $repository;

    /**
     * @var EnderecoRepository
     */
    private $repoEndereco;

    /**
     * @param EmpresaRepository $repository
     */
    public function __construct(EmpresaRepository $repository, EnderecoRepository $repoEndereco)
    {
        $this->repository = $repository;
        $this->repoEndereco = $repoEndereco;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        $relacionamentos = [
            'endereco.bairro.cidade.estado',
        ];
        
        #Recuperando o registro no banco de dados
        $empresa = $this->repository->with($relacionamentos)->find($id);

        #Verificando se o registro foi encontrado
        if(!$empresa) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $empresa;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Empresa
    {
        $endereco = $this->repoEndereco->create($data['endereco']);

        //dd($data);
        $data['endereco_id'] = $endereco->id;

        #Salvando o registro pincipal
        $empresa =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$empresa) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $empresa;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Empresa
    {
        
        #Atualizando no banco de dados
        $empresa = $this->repository->update($data, $id);
        $endereco = $this->repoEndereco->update($data['endereco'], $empresa->endereco->id);

        #Verificando se foi atualizado no banco de dados
        if(!$empresa || !$endereco) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $empresa;
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