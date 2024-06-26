<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Url;

class UrlTest extends TestCase
{
    private string $yandexUrl;
    private string $googleUrl;

    protected function setUp(): void
    {
        $this->yandexUrl = 'http://yandex.ru?key=value&key2=value2';
        $this->googleUrl = 'https://google.com:80?a=b&c=d&lala=value';
    }

    public function testYandex()
    {
        $url = new Url($this->yandexUrl);

        $this->assertEquals('http', $url->getScheme());
        $this->assertEquals('yandex.ru', $url->getHostName());
        $params = [
            'key' => 'value',
            'key2' => 'value2'
        ];
        $this->assertEquals($params, $url->getQueryParams());
        $this->assertEquals('value', $url->getQueryParam('key'));
        $this->assertEquals('value2', $url->getQueryParam('key2', 'lala'));
        $this->assertEquals('ehu', $url->getQueryParam('new', 'ehu'));
        $this->assertTrue($url->equals(new Url($this->yandexUrl)));
        $this->assertFalse($url->equals(new Url($this->googleUrl)));
    }

    public function testGoogle()
    {
        $url = new Url($this->googleUrl);

        $this->assertEquals('https', $url->getScheme());
        $this->assertEquals('google.com', $url->getHostName());
        $params = [
            'a' => 'b',
            'c' => 'd',
            'lala' => 'value'
        ];
        $this->assertEquals($params, $url->getQueryParams());
        $this->assertNull($url->getQueryParam('key'));
        $this->assertTrue($url->equals(new Url($this->googleUrl)));
        $this->assertFalse($url->equals(new Url('https://google.com')));
        $this->assertFalse($url->equals(new Url(str_replace('80', '443', $this->googleUrl))));
    }
}
