<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\SubservicoValidator;
use Serbinario\Repositories\SubservicoRepository;
use Serbinario\Entities\Subservico;

/**
 * Class SubservicoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SubservicoRepositoryEloquent extends BaseRepository implements SubservicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subservico::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return SubservicoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
