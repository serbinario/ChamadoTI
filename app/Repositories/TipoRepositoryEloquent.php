<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\TipoValidator;
use Serbinario\Repositories\TipoRepository;
use Serbinario\Entities\Tipo;

/**
 * Class TipoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TipoRepositoryEloquent extends BaseRepository implements TipoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tipo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return TipoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
