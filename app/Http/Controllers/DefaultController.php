<?php

namespace Serbinario\Http\Controllers;

use Illuminate\Http\Request;

use Serbinario\Http\Requests;
use Serbinario\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        $tops = \DB::table('chamado')
            ->join('users', 'users.id', '=', 'chamado.users_id')
            ->groupBy('users.id')
            ->orderBy('users.name')
            ->select([
                'users.name as nome',
                \DB::raw('count(chamado.id) as qtd'),
            ])->get();

        return view('default.index', compact('tops'));
    }

    /**
     * @return string
     */
    public function graficDashboard()
    {

        $data = new \DateTime('now');
        $ano  = $data->format('Y');
        $anoSimple  = $data->format('y');

        #Criando a consulta
        $rows = \DB::table('chamado')
            ->groupBy(\DB::raw('DATE_FORMAT(chamado.data,"%m")'))
            ->whereYear('data', '=', $ano)
            ->select([
                \DB::raw("CONCAT({$anoSimple}, '', DATE_FORMAT(chamado.data,'%m')) as data"),
                //\DB::raw('DATE_FORMAT(chamado.data,"%m") as data'),
                \DB::raw('count(chamado.id) as qtd'),
            ])->get();

        $dados = [];
        
        foreach ($rows as $row) {
            $r = ['year' => $row->data, 'value' => $row->qtd];
            $dados[] = $r;
        }
        
        
        return response()->json($dados);
    }
}
