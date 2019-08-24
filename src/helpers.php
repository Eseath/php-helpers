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

if (!function_exists('countWords')) {
    /**
     * Counts words in the specified text.
     *
     * @param  string $text
     * @return int
     */
    function countWords(string $text) : int
    {
        static $charlist;

        if ($charlist === null) {
            $charlist = '';

            for ($i = 192; $i < 256; $i++) {
                $charlist .= chr($i);
            }

            $charlist = iconv('cp1251', 'utf-8', $charlist);
        }

        return str_word_count($text, 0, $charlist);
    }
}

if (!function_exists('estimateReadingTime')) {
    /**
     * Estimates reading time of the specified text in seconds.
     *
     * @param  string  $text
     * @param  int     $words_per_minute
     * @return int
     */
    function estimateReadingTime(string $text, int $words_per_minute = 120) : int
    {
        return (int) floor(countWords($text) % $words_per_minute / ($words_per_minute / 60));
    }
}
