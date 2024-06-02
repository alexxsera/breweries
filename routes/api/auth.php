<?php

declare(strict_types=1);

use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Support\Facades\Route;

/*
    ALL ROUTES HERE ARE PREFIXED WITH 'auth'
*/

Route::post('/login', [AuthApiController::class, 'login']);
