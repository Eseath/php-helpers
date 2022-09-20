<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use function Eseath\Helpers\kv2array;

final class Kv2ArrayTest extends TestCase
{
    public function test() : void
    {
        $content = <<<KV
            nginx_version="1.10.3"
            pid="23253"
            msec="1663697371.721"
            time_local="20/Sep/2022:18:09:31 +0000"
            time_iso8601="2022-09-20T18:09:31+00:00"
            server_protocol="HTTP/2.0"
            server_addr="127.0.0.1"
            server_port="80"
            remote_user="-"
            host="sub.domain.com"
            http2="http2"
            hostname="machine"
            request_method="GET"
            request_uri="/?q=test&user_id=1514"
            status="200"
            request="GET /?q=test&suer_id=1514 HTTP/2.0"
            bytes_sent="531"
            http_user_agent="GuzzleHttp/6.2.1 curl/7.47.0 PHP/7.0.33-0ubuntu0.16.04.16"
        KV;

        $vars = [
            'nginx_version' => '1.10.3',
            'pid' => '23253',
            'msec' => '1663697371.721',
            'time_local' => '20/Sep/2022:18:09:31 +0000',
            'time_iso8601' => '2022-09-20T18:09:31+00:00',
            'server_protocol' => 'HTTP/2.0',
            'server_addr' => '127.0.0.1',
            'server_port' => '80',
            'remote_user' => '-',
            'host' => 'sub.domain.com',
            'http2' => 'http2',
            'hostname' => 'machine',
            'request_method' => 'GET',
            'request_uri' => '/?q=test&user_id=1514',
            'status' => '200',
            'request' => 'GET /?q=test&suer_id=1514 HTTP/2.0',
            'bytes_sent' => '531',
            'http_user_agent' => 'GuzzleHttp/6.2.1 curl/7.47.0 PHP/7.0.33-0ubuntu0.16.04.16',
        ];

        $this->assertSame($vars, kv2array($content));
    }
}
