<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\ListaValidator;
use Serbinario\Repositories\ListaRepository;
use Serbinario\Entities\Lista;

/**
 * Class ChamadoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ListaRepositoryEloquent extends BaseRepository implements ListaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Lista::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return ListaValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
