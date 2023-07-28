<?php

declare (strict_types=1);
namespace Lines202307\TomasVotruba\Lines\Helpers;

final class NumberFormat
{
    /**
     * @param int|float $number
     */
    public static function pretty($number) : string
    {
        return \number_format($number, 0, '.', ' ');
    }
    /**
     * @param float|int $number
     */
    public static function singleDecimal($number) : float
    {
        return (float) \number_format($number, 1);
    }
}
