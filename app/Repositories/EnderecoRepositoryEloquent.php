<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\EnderecoValidator;
use Serbinario\Repositories\EnderecoRepository;
use Serbinario\Entities\Endereco;

/**
 * Class EnderecoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EnderecoRepositoryEloquent extends BaseRepository implements EnderecoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Endereco::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return EnderecoValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
