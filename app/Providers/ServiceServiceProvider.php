<?php

namespace App\Providers;

use App\Interfaces\ClientServiceInterface;
use App\Services\ClientService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    $this->app->bind(ClientServiceInterface::class, ClientService::class);
  }

  public function boot(): void
  {
    //
  }
}
