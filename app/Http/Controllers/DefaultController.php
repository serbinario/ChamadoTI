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

    public function topDashboards () {


    }
}
