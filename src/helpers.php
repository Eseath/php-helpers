<?php

declare(strict_types=1);

namespace Eseath\Helpers;

/** Returns correct plural form of message for count. */
function pluralize(int $number, array $forms, bool $include_number = true) : string
{
    $i = $number % 100;

    if (!isset($forms[2])) {
        $forms[2] = $forms[1];
    }

    if ($i >= 11 && $i <= 19) {
        $result = $forms[2];
    } else {
        $i %= 10;
        $result = match ($i) {
            1 => $forms[0],
            2, 3, 4 => $forms[1],
            default => $forms[2],
        };
    }

    return $include_number ? "$number $result" : $result;
}

/**
 * Returns the data as a data URL representing the image file's data as a base64 encoded string.
 *
 * @example 'data:image/png;base64,iVBORw0KGgoAAAANSUhEU...BJRU5ErkJggg=='
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/Data_URIs
 */
function readImageAsDataURL(string $path) : string
{
    $mime_type = mime_content_type($path);

    if (!str_contains('image/jpeg|image/png|image/gif', $mime_type)) {
        throw new \InvalidArgumentException("File must be is image. '$mime_type' given.");
    }

    return "data:$mime_type;base64," . base64_encode(file_get_contents($path));
}

/** Capitalizes first letter of given string. */
function capitalizeFirstLetter(string $text, string $encoding = 'utf-8') : string
{
    return
        mb_strtoupper(mb_substr($text, 0, 1, $encoding), $encoding) .
        mb_substr($text, 1, null, $encoding);
}
