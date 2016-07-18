<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\ChamadoValidator;
use Serbinario\Repositories\ChamadoRepository;
use Serbinario\Entities\Chamado;

/**
 * Class ChamadoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ChamadoRepositoryEloquent extends BaseRepository implements ChamadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chamado::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return ChamadoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
