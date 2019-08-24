<?php

declare(strict_types=1);

namespace Eseath\Helpers\Tests;

use PHPUnit\Framework\TestCase;

final class EstimateReadingTimeTest extends TestCase
{
    public function test()
    {
        $time = estimateReadingTime('Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

        $this->assertSame(6, $time, 'At a speed of 120 words per minute, the reading time should be 6 seconds');
    }
}
