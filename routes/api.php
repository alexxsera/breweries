<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', static function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(static function (): void {
    Route::prefix('breweries')->group(static function (): void {
        require 'api/breweries.php';
    });
});

Route::prefix('auth')->group(static function (): void {
    require 'api/auth.php';
});
