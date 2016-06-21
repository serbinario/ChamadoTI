<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\ContratoValidator;
use Serbinario\Repositories\ContratoRepository;
use Serbinario\Entities\Contrato;

/**
 * Class ContratoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ContratoRepositoryEloquent extends BaseRepository implements ContratoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contrato::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return ContratoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
