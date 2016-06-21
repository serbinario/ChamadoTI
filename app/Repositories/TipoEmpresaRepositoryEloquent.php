<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\TipoEmpresaValidator;
use Serbinario\Repositories\TipoEmpresaRepository;
use Serbinario\Entities\TipoEmpresa;

/**
 * Class TipoEmpresaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TipoEmpresaRepositoryEloquent extends BaseRepository implements TipoEmpresaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoEmpresa::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return TipoEmpresaValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
