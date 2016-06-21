<?php

namespace Serbinario\Providers;

use Illuminate\Support\ServiceProvider;

class SeracademicoRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            \Serbinario\Repositories\UserRepository::class,
            \Serbinario\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \Serbinario\Repositories\RoleRepository::class,
            \Serbinario\Repositories\RoleRepositoryEloquent::class
        );

        $this->app->bind(
            \Serbinario\Repositories\PermissionRepository::class,
            \Serbinario\Repositories\PermissionRepositoryEloquent::class
        );


		$this->app->bind(
			\Serbinario\Repositories\FornecedorRepository::class,
			\Serbinario\Repositories\FornecedorRepositoryEloquent::class
		);
		$this->app->bind(
			\Serbinario\Repositories\PessoaRepository::class,
			\Serbinario\Repositories\PessoaRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\ClasseRepository::class,
			\Serbinario\Repositories\ClasseRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\TipoRepository::class,
			\Serbinario\Repositories\TipoRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\TipoEmpresaRepository::class,
			\Serbinario\Repositories\TipoEmpresaRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\EnderecoRepository::class,
			\Serbinario\Repositories\EnderecoRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\CidadeRepository::class,
			\Serbinario\Repositories\CidadeRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\EmpresaRepository::class,
			\Serbinario\Repositories\EmpresaRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\SituacaoRepository::class,
			\Serbinario\Repositories\SituacaoRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\ServicoRepository::class,
			\Serbinario\Repositories\ServicoRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\SubservicoRepository::class,
			\Serbinario\Repositories\SubservicoRepositoryEloquent::class
		);

		$this->app->bind(
			\Serbinario\Repositories\ContratoRepository::class,
			\Serbinario\Repositories\ContratoRepositoryEloquent::class
		);

	}
}