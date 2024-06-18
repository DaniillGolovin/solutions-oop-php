<?php

namespace Polymorphism\Tests;

use PHPUnit\Framework\TestCase;

use function Polymorphism\HTML\getLinks;
use function Polymorphism\HTML\stringify;

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

    public function testStringify1()
    {
        $tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];
        $html = stringify($tag);

        $expected = '<hr class="px-3" id="myid">';
        $this->assertEquals($expected, $html);
    }

    public function testStringify2()
    {
        $tag = ['name' => 'p', 'tagType' => 'pair', 'body' => 'text'];
        $html = stringify($tag);

        $expected = '<p>text</p>';
        $this->assertEquals($expected, $html);
    }

    public function testStringify3()
    {
        $tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow'];
        $html = stringify($tag);

        $expected = '<div id="wow">text2</div>';
        $this->assertEquals($expected, $html);
    }

    public function testStringify4()
    {
        $randomAttr = 'attr_' . rand();
        $tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow', $randomAttr => 'value'];
        $html = stringify($tag);

        $expected = '<div id="wow" ' . $randomAttr . '="value">text2</div>';
        $this->assertEquals($expected, $html);
    }
}
