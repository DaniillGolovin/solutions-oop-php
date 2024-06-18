<?php

namespace Polymorphism\Tests;

use PHPUnit\Framework\TestCase;

use function Polymorphism\HTML\getLinks;

class HTMLTest extends TestCase
{

    public function testGetLinks1()
    {
        $tags = [];
        $link = getLinks($tags);
        $this->assertEmpty($link);
    }

    public function testGetLinks2()
    {
        $tags = [
            ['name' => 'p'],
            ['name' => 'a', 'href' => 'hexlet.io'],
            ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
        ];
        $expected = [
            'hexlet.io',
            'hexlet.io/assets/logo.png'
        ];
        $link = getLinks($tags);
        $this->assertEquals($expected, $link);
    }

    public function testGetLinks3()
    {
        $tags = [
            ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
            ['name' => 'div'],
            ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
            ['name' => 'h1']
        ];
        $links = getLinks($tags);

        $expected = [
            'hexlet.io/assets/logo.png',
            'hexlet.io/assets/style.css'
        ];
        $this->assertEquals($expected, $links);
    }
}
