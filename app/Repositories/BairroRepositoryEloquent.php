<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\BairroValidator;
use Serbinario\Repositories\BairroRepository;
use Serbinario\Entities\Bairro;

/**
 * Class BairroRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BairroRepositoryEloquent extends BaseRepository implements BairroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bairro::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return BairroValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
