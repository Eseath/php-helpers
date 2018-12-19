<?php

declare(strict_types=1);

if (!function_exists('pluralize')) {
    /**
     * Pluralize.
     *
     * @param  int    $number
     * @param  array  $declension
     * @param  bool   $include_number
     * @return string
     */
    function pluralize(int $number, array $declension, bool $include_number = true) : string
    {
        $i = $number % 100;

        if (!isset($declension[2])) {
            $declension[2] = $declension[1];
        }

        if ($i >= 11 && $i <= 19) {
            $result = $declension[2];
        } else {
            $i %= 10;

            switch ($i) {
                case 1:
                    $result = $declension[0];
                    break;
                case 2:
                case 3:
                case 4:
                    $result = $declension[1];
                    break;
                default:
                    $result = $declension[2];
            }
        }

        return $include_number ? $number . ' ' . $result : $result;
    }
}
