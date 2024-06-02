<?php

declare(strict_types=1);

namespace App\Services\Breweries;

use App\DataResult\Classes\DataResult;

interface BreweryServiceInterface
{
    public function breweries(int $page): DataResult;
}
