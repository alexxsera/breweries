<?php

declare(strict_types=1);

namespace App\DataResult\Classes;

use function in_array;

final class DataResult
{
    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function setData(mixed $data): void
    {
        $this->data = $data;
    }

    public function getErrorMessage(): string|null
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(string|null $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    public function isSuccess(): bool
    {
        return ! in_array($this->status, ResultStatus::ERROR_CODES);
    }

    /** @var mixed|null $data = null */
    private mixed $data = null;
    private string|null $errorMessage = null;
    private int $status = ResultStatus::NONE;
}
