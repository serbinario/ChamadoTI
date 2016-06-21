<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\FornecedorValidator;
use Serbinario\Repositories\FornecedorRepository;
use Serbinario\Entities\Fornecedor;

/**
 * Class FornecedorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FornecedorRepositoryEloquent extends BaseRepository implements FornecedorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Fornecedor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return FornecedorValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
