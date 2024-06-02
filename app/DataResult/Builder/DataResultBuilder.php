<?php

declare(strict_types=1);

namespace App\DataResult\Builder;

use App\DataResult\Classes\DataResult;
use App\DataResult\Classes\ResultStatus;
use App\DataResult\Interfaces\DataResultBuilderInterface;
use RuntimeException;

final class DataResultBuilder implements DataResultBuilderInterface
{
    public function __construct(private DataResult $dataResult)
    {
    }

    public function status(int $status): self
    {
        $this->dataResult->setStatus($status);

        return $this;
    }

    public function data(mixed $data): DataResultBuilder
    {
        $this->dataResult->setData($data);

        return $this;
    }

    public function done(): DataResult
    {
        if ($this->finalized) {
            throw new RuntimeException('done() called more than once');
        }

        $this->doFinalize();
        $this->finalized = true;

        return $this->dataResult;
    }

    private function doFinalize(): void
    {
        $status = $this->dataResult->getStatus() !== ResultStatus::NONE ? $this->dataResult->getStatus() : ResultStatus::OK;

        $this->dataResult->setStatus($status);
    }

    private bool $finalized = false;
}
