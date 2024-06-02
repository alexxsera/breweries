<?php

declare(strict_types=1);

namespace App\DataResult\Traits;

use App\DataResult\Builder\DataResultBuilder;
use App\DataResult\Classes\DataResult;

trait DataResultTrait
{
    public function buildDataResult(mixed $data = null, string|null $errorMessage = null): DataResultBuilder
    {
        $dataResult = new DataResult();
        $dataResult->setData($data);

        if ($errorMessage) {
            $dataResult->setErrorMessage($errorMessage);
        }

        return new DataResultBuilder($dataResult);
    }
}
