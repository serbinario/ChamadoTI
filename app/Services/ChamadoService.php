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
        $chamado = $this->repository->find($id);

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