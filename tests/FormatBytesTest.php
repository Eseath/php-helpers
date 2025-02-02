<?php

declare(strict_types=1);

namespace Eseath\Helpers\Tests;

use PHPUnit\Framework\TestCase;
use function Eseath\Helpers\formatBytes;

final class FormatBytesTest extends TestCase
{
    public function testWordInTwoCases() : void
    {
        $this->assertEquals('0 B', formatBytes(0));
        $this->assertEquals('1 B', formatBytes(1));
        $this->assertEquals('1 KB', formatBytes(1024));
        $this->assertEquals('1 MB', formatBytes(1024 * 1024));
        $this->assertEquals('1 GB', formatBytes(1024 * 1024 * 1024));
        $this->assertEquals('1 TB', formatBytes(1024 * 1024 * 1024 * 1024));
    }
}
