<?php

namespace Serbinario\Http\Controllers;

use Illuminate\Http\Request;

use Serbinario\Http\Requests;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
//use Khill\Lavacharts\Lavacharts;

class GraficosController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('biblioteca.responsavel.index');
    }

    /**
     * @return mixed
     */
    public function departamento()
    {
        return view('graficos.chartDepartamento');
    }

    /**
     * @return string
     */
    public function departamentoAjax()
    {
        #Criando a consulta
        $rows = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(15)->take(25)->get();

        $dados = [];
        //$dados[0] = ['Element', 'Chamados', ['role' => 'style']];

        $contar = 1;
        foreach ($rows as $row) {
            $r = [$row->nome, $row->qtd];
            $dados[] = $r;
            $contar++;
        }

      // dd($dados);

        return response()->json($dados);
    }


    /**
     * @return mixed
     */
    public function lista()
    {
        return view('graficos.chartLista');
    }

    /**
     * @return string
     */
    public function listaAjax()
    {
        #Criando a consulta
        $rows = \DB::table('chamado')
            ->join('sublista', 'sublista.id', '=', 'chamado.sublista_id')
            ->join('lista', 'lista.id', '=', 'sublista.lista_id')
            ->groupBy('sublista.lista_id')
            ->select([
                'lista.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->get();

        $dados = [];
        //$dados[0] = ['Chamados', 'Chamados'];

        $contar = 1;
        foreach ($rows as $row) {
            $r = [$row->nome, $row->qtd];
            $dados[] = $r;
            $contar++;
        }


        return response()->json($dados);
    }

    /**
     * @return mixed
     */
    public function idade()
    {
        return view('ouvidoria.graficos.chartIdade');
    }

    public function idadeAjax()
    {
        #Criando a consulta
        $rows = \DB::table('ouv_demanda')
            ->join('ouv_idade', 'ouv_idade.id', '=', 'ouv_demanda.idade_id')
            ->groupBy('ouv_demanda.idade_id')
            ->whereBetween('ouv_idade.id', array(1, 20))
            ->select([
                'ouv_idade.nome as nome',
                \DB::raw('count(ouv_demanda.id) as qtd'),
            ])->get();

        //dd($rows);

        $dados = [];
        $dados[0] = ['Element', 'Density', ['role' => 'style']];

        $contar = 1;
        foreach ($rows as $row) {
            $r = ["1-20", $row->qtd, 'silver'];
            $dados[$contar] = $r;
            $contar++;
        }

        return response()->json($dados);
    }

    /**
     * @return string
     */
    /*public function idadeAjax()
    {
        #Criando a consulta
        $rows = \DB::table('ouv_demanda')
            ->join('ouv_idade', 'ouv_idade.id', '=', 'ouv_demanda.idade_id')
            ->groupBy('ouv_demanda.idade_id')
            ->select([
                'ouv_idade.nome as nome',
                \DB::raw('count(ouv_demanda.id) as qtd'),
            ])->get();

        $dados = [];
        $dados[0] = ['Idade', 'Idades'];

        $contar = 1;
        foreach ($rows as $row) {
            $r = [$row->nome, $row->qtd];
            $dados[$contar] = $r;
            $contar++;
        }

        return response()->json($dados);
    }*/

}
