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
    public function bySecretaria()
    {
        
        $secretarias = \DB::table('departamento')->orderBy('nome')->get();
        
        return view('graficos.bySecretaria', compact('secretarias'));
    }

    /**
     * @return string
     */
    public function graficoBySecretaria(Request $request)
    {
        
        $campo = $request->request->get('campo');

        #Criando a consulta
        $rows = \DB::table('chamado')
            ->join('departamento', 'departamento.id', "=", "chamado.departamento_id")
            ->where('departamento.id', '=', $campo)
            ->whereYear('data', '=', '2016')
            ->groupBy(\DB::raw('DATE_FORMAT(chamado.data,"%m")'))
            ->select([
                \DB::raw('CONCAT("16", "", DATE_FORMAT(chamado.data,"%m")) as data'),
                //\DB::raw('DATE_FORMAT(chamado.data,"%m") as data'),
                \DB::raw('count(chamado.id) as qtd'),
            ])->get();

        //dd($rows);

        $dados = [];

        foreach ($rows as $row) {
            $r = ['year' => $row->data, 'value' => $row->qtd];
            $dados[] = $r;
        }


        return response()->json($dados);
    }

    /**
     * @return mixed
     */
    public function byTecnico()
    {

        $tecnicos = \DB::table('users')->orderBy('name')->get();

        return view('graficos.byTecnicos', compact('tecnicos'));
    }

    /**
     * @return string
     */
    public function graficoByTecnico(Request $request)
    {

        $campo = $request->request->get('campo');

        #Criando a consulta
        $rows = \DB::table('chamado')
            ->join('users', 'users.id', "=", "chamado.users_id")
            ->where('users.id', '=', $campo)
            ->whereYear('data', '=', '2016')
            ->groupBy(\DB::raw('DATE_FORMAT(chamado.data,"%m")'))
            ->select([
                \DB::raw('CONCAT("16", "", DATE_FORMAT(chamado.data,"%m")) as data'),
                //\DB::raw('DATE_FORMAT(chamado.data,"%m") as data'),
                \DB::raw('count(chamado.id) as qtd'),
            ])->get();

        //dd($rows);

        $dados = [];

        foreach ($rows as $row) {
            $r = ['year' => $row->data, 'value' => $row->qtd];
            $dados[] = $r;
        }


        return response()->json($dados);
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
        $rows1 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->take(10)->get();

        $rows2 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(10)->take(10)->get();

        $rows3 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(20)->take(10)->get();

        $rows4 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(30)->take(10)->get();

        $rows5 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(40)->take(10)->get();

        $rows6 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(50)->take(10)->get();

        $rows7 = \DB::table('chamado')
            ->join('departamento', 'departamento.id', '=', 'chamado.departamento_id')
            ->groupBy('chamado.departamento_id')
            ->orderBy('departamento.nome')
            ->select([
                'departamento.nome as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->skip(60)->take(10)->get();
        

        $dados1 = [];
        $dados2 = [];
        $dados3 = [];
        $dados4 = [];
        $dados5 = [];
        $dados6 = [];
        $dados7 = [];

        $dados  = [];

        foreach ($rows1 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados1[] = $r;
        }

        foreach ($rows2 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados2[] = $r;
        }

        foreach ($rows3 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados3[] = $r;
        }

        foreach ($rows4 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados4[] = $r;
        }

        foreach ($rows5 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados5[] = $r;
        }

        foreach ($rows6 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados6[] = $r;
        }

        foreach ($rows7 as $row) {
            $r = [$row->nome, $row->qtd];
            $dados7[] = $r;
        }

        $dados[0] = $dados1;
        $dados[1] = $dados2;
        $dados[2] = $dados3;
        $dados[3] = $dados4;
        $dados[4] = $dados5;
        $dados[5] = $dados6;
        $dados[6] = $dados7;

        //dd($dados);

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
