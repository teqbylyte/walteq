<?php


/**
 * Convert to human-readable format with country's currency
 *
 * @param float $value
 * @param string $symbol
 * @return string
 */
function moneyFormat(float $value, string $symbol = '₦'): string
{
    return "$symbol" .  number_format ($value, 2);
}
