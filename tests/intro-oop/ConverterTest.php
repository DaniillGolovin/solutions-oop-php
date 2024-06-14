<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Converter\toStd;

class ConverterTest extends TestCase
{
    public function testConverter()
    {
        $data = [
            'key' => 'value',
            'key2' => 'value2',
        ];
        $actual = toStd($data);
        $this->assertEquals((object) $data, $actual);
        $this->assertEquals('value', $actual->key);
    }
}
