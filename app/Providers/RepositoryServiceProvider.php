<?php

namespace App\Providers;

use App\Interfaces\ClientRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ClientRepository;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
