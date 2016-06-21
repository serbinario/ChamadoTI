<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\CidadeValidator;
use Serbinario\Repositories\CidadeRepository;
use Serbinario\Entities\Cidade;

/**
 * Class CidadeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CidadeRepositoryEloquent extends BaseRepository implements CidadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cidade::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return CidadeValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
