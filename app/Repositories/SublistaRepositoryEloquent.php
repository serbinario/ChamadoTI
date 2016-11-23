<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\SublistaValidator;
use Serbinario\Repositories\SublistaRepository;
use Serbinario\Entities\Sublista;

/**
 * Class SublistaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SublistaRepositoryEloquent extends BaseRepository implements SublistaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sublista::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return SublistaValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
