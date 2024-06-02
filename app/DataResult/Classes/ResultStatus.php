<?php

declare(strict_types=1);

namespace App\DataResult\Classes;

final class ResultStatus
{
    public const NONE = 0;
    public const OK = 1;
    public const VALIDATION_FAILED = 2;
    public const UNKNOWN_ERROR = 3;
    public const NOT_FOUND = 4;
    public const PERMISSION_DENIED = 5;

    public const ERROR_CODES = [
        self::VALIDATION_FAILED,
        self::UNKNOWN_ERROR,
        self::NOT_FOUND,
        self::PERMISSION_DENIED,
    ];
}
