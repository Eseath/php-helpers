<?php

declare(strict_types=1);

namespace Eseath\Helpers\Tests;

use PHPUnit\Framework\TestCase;

use function Eseath\Helpers\pluralize;

final class PluralizeTest extends TestCase
{
    public function testWordInTwoCases() : void
    {
        $cases = ['apple', 'apples'];

        $this->assertEquals("0 $cases[1]", pluralize(0, $cases));
        $this->assertEquals("1 $cases[0]", pluralize(1, $cases));
        $this->assertEquals("2 $cases[1]", pluralize(2, $cases));
        $this->assertEquals("5 $cases[1]", pluralize(5, $cases));
        $this->assertEquals("11 $cases[1]", pluralize(11, $cases));
    }

    public function testWordInThreeCases() : void
    {
        $cases = ['яблоко', 'яблока', 'яблок'];

        $this->assertEquals("0 $cases[2]", pluralize(0, $cases));
        $this->assertEquals("1 $cases[0]", pluralize(1, $cases));
        $this->assertEquals("2 $cases[1]", pluralize(2, $cases));
        $this->assertEquals("5 $cases[2]", pluralize(5, $cases));
        $this->assertEquals("11 $cases[2]", pluralize(11, $cases));
        $this->assertEquals("101 $cases[0]", pluralize(101, $cases));
    }
}
