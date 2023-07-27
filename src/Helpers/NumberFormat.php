<?php

declare(strict_types=1);

namespace TomasVotruba\Lines\Helpers;

final class NumberFormat
{
    public static function pretty(int|float $number): string
    {
        return number_format($number, 0, '.', ' ');
    }

    public static function singleDecimal(float|int $number): float
    {
        return (float) number_format($number, 1);
    }
}