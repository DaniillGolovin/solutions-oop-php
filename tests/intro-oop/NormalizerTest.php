<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Normalizer\normalize;

class NormalizerTest extends TestCase
{
    public function testNormalize()
    {
        $raw = [
            [
                'name' => 'istambul',
                'country' => 'turkey'
            ],
            [
                'name' => 'Moscow ',
                'country' => ' Russia'
            ],
            [
                'name' => 'iStambul',
                'country' => 'tUrkey'
            ],
            [
                'name' => 'antalia',
                'country' => 'turkeY '
            ],
            [
                'name' => 'samarA',
                'country' => '  ruSsiA'
            ],
        ];

        $actual = normalize($raw);
        $expected = [
            'russia' => [
                'moscow', 'samara'
            ],
            'turkey' => [
                'antalia', 'istambul'
            ]
        ];
        $this->assertEquals($expected, $actual);
    }
}
