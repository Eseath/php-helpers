<?php

declare(strict_types=1);

namespace Eseath\Helpers\Tests;

use PHPUnit\Framework\TestCase;

use function Eseath\Helpers\readImageAsDataURL;

final class ReadImageAsDataUrlTest extends TestCase
{
    public function testPDFMustThrowException() : void
    {
        $this->expectException(\InvalidArgumentException::class);

        readImageAsDataURL(__DIR__ . '/assets/blank.pdf');
    }

    public function testPNGMustBeConvertedToBase64Url() : void
    {
        $expected = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==';
        $result = readImageAsDataURL(__DIR__ . '/assets/image.1x1.png');

        self::assertEquals($expected, $result);
    }

    public function testGIFMustBeConvertedToBase64Url() : void
    {
        $expected = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
        $result = readImageAsDataURL(__DIR__ . '/assets/image.1x1.gif');

        self::assertEquals($expected, $result);
    }

    public function testJPGMustBeConvertedToBase64Url() : void
    {
        $expected = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD//gATQ3JlYXRlZCB3aXRoIEdJTVD/2wBDAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/2wBDAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQH/wAARCAABAAEDAREAAhEBAxEB/8QAFAABAAAAAAAAAAAAAAAAAAAAC//EABQQAQAAAAAAAAAAAAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AP/B//9k=';
        $result = readImageAsDataURL(__DIR__ . '/assets/image.1x1.jpg');

        self::assertEquals($expected, $result);
    }

    public function testWEBPMustBeConvertedToBase64Url() : void
    {
        $expected = 'data:image/webp;base64,UklGRhwAAABXRUJQVlA4TBAAAAAvAAAAEAfQ//5H/wIR0f8A';
        $result = readImageAsDataURL(__DIR__ . '/assets/image.1x1.webp');

        self::assertEquals($expected, $result);
    }
}
