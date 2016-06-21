<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\SituacaoValidator;
use Serbinario\Repositories\SituacaoRepository;
use Serbinario\Entities\Situacao;

/**
 * Class SituacaoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SituacaoRepositoryEloquent extends BaseRepository implements SituacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Situacao::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return SituacaoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
