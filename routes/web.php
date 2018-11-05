<?php

use Encore\Admin\IdValidator\Http\Controllers\IdValidatorController;

Route::get('id-validator', IdValidatorController::class.'@index');