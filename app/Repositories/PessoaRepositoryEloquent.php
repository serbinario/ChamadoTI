<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\PessoaValidator;
use Serbinario\Repositories\PessoaRepository;
use Serbinario\Entities\Pessoa;

/**
 * Class PessoaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PessoaRepositoryEloquent extends BaseRepository implements PessoaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pessoa::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return PessoaValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
