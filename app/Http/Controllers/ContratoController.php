<?php

namespace Serbinario\Http\Controllers;

use Illuminate\Http\Request;

use Serbinario\Http\Requests;
use Serbinario\Services\ContratoService;
use Yajra\Datatables\Datatables;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Serbinario\Validators\ContratoValidator;

class ContratoController extends Controller
{
    /**
    * @var ContratoService
    */
    private $service;

    /**
    * @var ContratoValidator
    */
    private $validator;

    /**
    * @var array
    */
    private $loadFields = [
        'Fornecedor'
    ];

    /**
    * @param ContratoService $service
    * @param ContratoValidator $validator
    */
    public function __construct(ContratoService $service, ContratoValidator $validator)
    {
        $this->service   =  $service;
        $this->validator =  $validator;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contrato.index');
    }

    /**
     * @return mixed
     */
    public function grid()
    {
        #Criando a consulta
        $rows = \DB::table('contrato')->select(['id', 'foro_cidade']);

        #Editando a grid
        return Datatables::of($rows)->addColumn('action', function ($row) {

            $html = '<a href="edit/'.$row->id.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Editar</a> ';
            $html .= '<a href="contrato/'.$row->id.'" class="btn btn-xs btn-success" target="__blanck"><i class="fa fa-edit"></i> Contrato</a>';

            return $html;
        })->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        #Carregando os dados para o cadastro
        $loadFields = $this->service->loadFornecedor($this->loadFields);

        #serviços
        $servicos = $this->service->servicos();

        #Retorno para view
        return view('contrato.create', compact('loadFields', 'servicos'));
    }

    /**
     * @param Request $request
     * @return $this|array|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Validando a requisição
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            #Executando a ação
            $this->service->store($data);

            #Retorno para a view
            return redirect()->back()->with("message", "Cadastro realizado com sucesso!");
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) {print_r($e->getMessage()); exit;
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            #Recuperando a empresa
            $model = $this->service->find($id);

            #Tratando as datas
            $model = $this->service->getWithDateFormatPtBr($model);

            #Carregando os dados para o cadastro
            $loadFields = $this->service->loadFornecedor($this->loadFields);

            #serviços
            $servicos = $this->service->servicos();

            #retorno para view
            return view('contrato.edit', compact('model', 'loadFields', 'servicos'));
        } catch (\Throwable $e) {dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            #Recuperando os dados da requisição
            $data = $request->all();

            #Validando a requisição
            //$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            #Executando a ação
            $this->service->update($data, $id);

            #Retorno para a view
            return redirect()->back()->with("message", "Alteração realizada com sucesso!");
        } catch (ValidatorException $e) {
            return redirect()->back()->withErrors($this->validator->errors())->withInput();
        } catch (\Throwable $e) { dd($e);
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contrato(Request $request, $id)
    {
        $contrato = $this->service->find($id);

        $servicos = array();
        $idServico = 0;
        $count = 0;

        for ($i = 0; $i < count($contrato->subservico); $i++) {
            if($contrato->subservico[$i]->servico->id != $idServico) {
                $servicos[$count]['id'] = $contrato->subservico[$i]->servico->id;
                $servicos[$count]['nome'] = $contrato->subservico[$i]->servico->nome;
                $count++;
            }
            $idServico = $contrato->subservico[$i]->servico->id;
        }

        $empresa = \DB::table('empresa')->select(['id', 'nome'])->get();

        return \PDF::loadView('reports.contrato', ['contrato' =>  $contrato, 'servicos' => $servicos, 'empresa' => $empresa[0]])->stream();
    }

}
