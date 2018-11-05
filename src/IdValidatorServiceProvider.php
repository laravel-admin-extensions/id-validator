<?php

namespace Encore\Admin\IdValidator;

use Illuminate\Support\ServiceProvider;

class IdValidatorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if (! IdValidator::boot()) {
            return ;
        }

        $this->app->booted(function () {
            IdValidator::routes(__DIR__.'/../routes/web.php');
        });
    }
}