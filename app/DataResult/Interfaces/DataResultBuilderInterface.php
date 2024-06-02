<?php

declare(strict_types=1);

namespace App\DataResult\Interfaces;

use App\DataResult\Builder\DataResultBuilder;

interface DataResultBuilderInterface
{
    public function data(mixed $data): DataResultBuilder;
}
