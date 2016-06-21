<?php

namespace Serbinario\Http\Controllers;

use Illuminate\Http\Request;

use Serbinario\Http\Requests;
use Serbinario\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        return view('default.index');
    }
}
