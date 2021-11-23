<?php

declare(strict_types=1);

namespace Eseath\Helpers\Tests;

use PHPUnit\Framework\TestCase;

use function Eseath\Helpers\capitalizeFirstLetter;

final class CapitalizeFirstLetterTest extends TestCase
{
    public function testLatin() : void
    {
        self::assertSame('Hello', capitalizeFirstLetter('hello'));
        self::assertSame('Hello world', capitalizeFirstLetter('hello world'));
    }

    public function testCyrillic() : void
    {
        self::assertSame('Привет', capitalizeFirstLetter('привет'));
        self::assertSame('Привет, мир', capitalizeFirstLetter('привет, мир'));
    }
}
