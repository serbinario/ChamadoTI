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
			\Serbinario\Repositories\ChamadoRepository::class,
			\Serbinario\Repositories\ChamadoRepositoryEloquent::class
		);
	}
}