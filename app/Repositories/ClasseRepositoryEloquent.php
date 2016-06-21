<?php

namespace Serbinario\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Serbinario\Validators\ClasseValidator;
use Serbinario\Repositories\ClasseRepository;
use Serbinario\Entities\Classe;

/**
 * Class ClasseRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ClasseRepositoryEloquent extends BaseRepository implements ClasseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Classe::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

         return ClasseValidator::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
