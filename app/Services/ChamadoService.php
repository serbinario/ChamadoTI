<?php

namespace Serbinario\Services;

use Serbinario\Repositories\ChamadoRepository;
use Serbinario\Entities\Chamado;

class ChamadoService
{
    /**
     * @var ChamadoRepository
     */
    private $repository;

    /**
     * @param ChamadoRepository $repository
     */
    public function __construct(ChamadoRepository $repository)
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
        $chamado = $this->repository->with(['sublista.lista', 'departamento', 'user'])->find($id);

        #Verificando se o registro foi encontrado
        if(!$chamado) {
            throw new \Exception('Empresa não encontrada!');
        }

        #retorno
        return $chamado;
    }

    /**
     * @param array $data
     * @return array
     */
    public function store(array $data) : Chamado
    {

        #pegando sessão de usuário
        $user = \Auth::user();
        
        $data = $this->tratamentoCampos($data);

        $codigo = \DB::table('chamado')->max('codigo');
        $codigoMax = $codigo != null ? $codigoMax = $codigo + 1 : $codigoMax = "1";
        
        #Salvando o registro pincipal
        $data['codigo'] = $codigoMax;
        $data['users_id'] = $user->id;
        $chamado =  $this->repository->create($data);

        #Verificando se foi criado no banco de dados
        if(!$chamado) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $chamado;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id) : Chamado
    {

        $data = $this->tratamentoCampos($data);

        #Atualizando no banco de dados
        $chamado = $this->repository->update($data, $id);


        #Verificando se foi atualizado no banco de dados
        if(!$chamado) {
            throw new \Exception('Ocorreu um erro ao cadastrar!');
        }

        #Retorno
        return $chamado;
    }

    /**
     * @param array $models
     * @return array
     */
    public function load(array $models, $ajax = false) : array
    {
        #Declarando variáveis de uso
        $result    = [];
        $expressao = [];
        #Criando e executando as consultas
        foreach ($models as $model) {
            # separando as strings
            $explode   = explode("|", $model);
            # verificando a condição
            if(count($explode) > 1) {
                $model     = $explode[0];
                $expressao = explode(",", $explode[1]);
            }
            #qualificando o namespace
            $nameModel = "\\Serbinario\\Entities\\$model";
            #Verificando se existe sobrescrita do nome do model
            //$model     = isset($expressao[2]) ? $expressao[2] : $model;
            if ($ajax) {
                if(count($expressao) > 0) {
                    switch (count($expressao)) {
                        case 1 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}()->orderBy('nome', 'asc')->get(['nome', 'id', 'codigo']);
                            break;
                        case 2 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1])->orderBy('nome', 'asc')->get(['nome', 'id', 'codigo']);
                            break;
                        case 3 :
                            #Recuperando o registro e armazenando no array
                            $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1], $expressao[2])->orderBy('nome', 'asc')->get(['nome', 'id', 'codigo']);
                            break;
                    }
                } else {
                    #Recuperando o registro e armazenando no array
                    $result[strtolower($model)] = $nameModel::orderBy('nome', 'asc')->get(['nome', 'id']);
                }
            } else {
                if(count($expressao) > 1) {
                    #Recuperando o registro e armazenando no array
                    $result[strtolower($model)] = $nameModel::{$expressao[0]}($expressao[1])->orderBy('nome', 'asc')->lists('nome', 'id');
                } else {
                    #Recuperando o registro e armazenando no array
                    $result[strtolower($model)] = $nameModel::orderBy('nome', 'asc')->lists('nome', 'id');
                }
            }
            # Limpando a expressão
            $expressao = [];
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
        $data['data']           = $this->convertDate($data['data'], 'en');

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
        $model->data   = $model->vencimento == '0000-00-00' ? "" : $model->data;

        #tratando as datas
        $model->data   = date('d/m/Y', strtotime($model->data));

        //$aluno->data_exame_nacional_um   = date('d/m/Y', strtotime($aluno->data_exame_nacional_um));
        //$aluno->data_exame_nacional_dois = date('d/m/Y', strtotime($aluno->data_exame_nacional_dois));
        #return
        return $model;
    }
}