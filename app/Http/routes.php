<?php

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');
    });

    Route::group(['prefix' => 'serbinario', 'middleware' => 'auth', 'as' => 'serbinario.'], function () {
//    Route::get('login'  , ['as' => 'login', 'uses' => 'SecurityController@login']);
//    Route::get('logout'  , ['as' => 'logout', 'uses' => 'SecurityController@logout']);
//    Route::post('check'  , ['as' => 'check', 'uses' => 'SecurityController@check']);
//    Route::get('index'  , ['as' => 'index', 'middleware'=>'security:ROLE_ADMIN', 'uses' => 'DefaultController@index']);
//    Route::get('update2'  , ['as' => 'update2', 'middleware'=>'security:ROLE_ADMIN', 'uses' => 'DefaultController@update2']);

        Route::get('index'  , ['as' => 'index', 'uses' => 'DefaultController@index']);

        Route::group(['prefix' => 'fornecedor', 'as' => 'fornecedor.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'FornecedorController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'FornecedorController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'FornecedorController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'FornecedorController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'FornecedorController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'FornecedorController@update']);
        });

        Route::group(['prefix' => 'empresa', 'as' => 'empresa.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'EmpresaController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'EmpresaController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'EmpresaController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'EmpresaController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'EmpresaController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'EmpresaController@update']);
        });

        Route::group(['prefix' => 'servico', 'as' => 'servico.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'ServicoController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'ServicoController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'ServicoController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ServicoController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ServicoController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ServicoController@update']);
        });

        Route::group(['prefix' => 'subservico', 'as' => 'subservico.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'SubservicoController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'SubservicoController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'SubservicoController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'SubservicoController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SubservicoController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'SubservicoController@update']);
        });

        Route::group(['prefix' => 'contrato', 'as' => 'contrato.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'ContratoController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'ContratoController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'ContratoController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ContratoController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ContratoController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ContratoController@update']);
            Route::get('contrato/{id}', ['as' => 'contrato', 'uses' => 'ContratoController@contrato']);
        });

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'UserController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'UserController@update']);
        });

        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'RoleController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'RoleController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'RoleController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'RoleController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'RoleController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'RoleController@update']);
        });

        Route::group(['prefix' => 'util', 'as' => 'util.'], function () {
            Route::post('search', ['as' => 'search', 'uses' => 'UtilController@search']);
            Route::post('select2', ['as' => 'select2', 'uses' => 'UtilController@queryByselect2']);
        });


//    Route::get('report/contratoAluno/{id}', ['as' => 'report.contratoAluno', 'uses' => 'ReportController@contratoAluno']);
//    Route::get('user/save/', ['as' => 'user.save', 'uses' => 'UserController@save']);
//    Route::Post('user/store/', ['as' => 'user.store', 'uses' => 'UserController@store']);
//    Route::Post('user/update/', ['as' => 'user.update', 'uses' => 'UserController@update']);
//    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
//    Route::get('user/grid', ['as' => 'user.grid', 'uses' => 'UserController@grid']);
    });
});