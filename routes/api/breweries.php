<?php

declare(strict_types=1);

use App\Http\Controllers\Api\BreweriesApiController;
use Illuminate\Support\Facades\Route;

/*
    ALL ROUTES HERE ARE PREFIXED WITH 'breweries'
*/

Route::get('/', [BreweriesApiController::class, 'breweries']);
