<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        foreach ($this->getModels() as $model) {
            $this->app->bind("App\Repositories\Contracts\\{$model}RepositoryInterface", "App\Repositories\DataBase\\{$model}Repository");
        }
    }

    protected function getModels(): Collection
    {
        $files = File::allFiles(app_path('Models'));
        return collect($files)->map(function ($file) {
            return basename($file, '.php');
        });
    }

    public function boot(): void
    {
        //
    }
}
