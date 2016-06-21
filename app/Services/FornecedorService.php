<?php

namespace Serbinario\Services;

use Serbinario\Repositories\EnderecoRepository;
use Serbinario\Repositories\FornecedorRepository;
use Serbinario\Entities\Fornecedor;

class FornecedorService
{
    /**
     * @var FornecedorRepository
     */
    private $repository;

    /**
     * @var EnderecoRepository
     */
    private $repoEndereco;

    /**
     * @param FornecedorRepository $repository
     */
    public function __construct(FornecedorRepository $repository, EnderecoRepository $repoEndereco)
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
            'pessoa',
            'situacao',
            'tipo',
            'tipoEmpresa',
            'endereco'
        ];
        
        #Recuperando o registro no banco de dados
        $fornecedor = $this->repository->with($relacionamentos)->find($id);

        #Verificando se o registro foi encontrado
        if(!$fornecedor) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $fornecedor;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Fornecedor
    {

        $data = $this->tratamentoCampos($data);

        $endereco = $this->repoEndereco->create($data['endereco']);

        //dd($data);
        $data['endereco_id'] = $endereco->id;
        
        #Salvando o registro pincipal
        $fornecedor =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$fornecedor) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $fornecedor;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Fornecedor
    {

        $data = $this->tratamentoCampos($data);

        #Atualizando no banco de dados
        $fornecedor = $this->repository->update($data, $id);
        $endereco = $this->repoEndereco->update($data['endereco'], $fornecedor->endereco->id);


        #Verificando se foi atualizado no banco de dados
        if(!$fornecedor || !$endereco) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $fornecedor;
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
     * @param $data
     * @return mixed
     */
    private function tratamentoCampos($data)
    {
        #tratamento de datas do aluno
        $data['vencimento']           = $this->convertDate($data['vencimento'], 'en');

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
        $model->vencimento   = $model->vencimento == '0000-00-00' ? "" : $model->vencimento;

        #tratando as datas
        $model->vencimento   = date('d/m/Y', strtotime($model->vencimento));

        //$aluno->data_exame_nacional_um   = date('d/m/Y', strtotime($aluno->data_exame_nacional_um));
        //$aluno->data_exame_nacional_dois = date('d/m/Y', strtotime($aluno->data_exame_nacional_dois));
        #return
        return $model;
    }
}