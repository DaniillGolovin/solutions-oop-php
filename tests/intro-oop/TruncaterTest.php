<?php

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncate()
    {
        $truncater = new Truncater();
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one two', $actual);

        $actual = $truncater->truncate('one two', ['length' => 6]);
        $this->assertEquals('one tw...', $actual);

        $actual = $truncater->truncate('one two', ['separator' => '.']);
        $this->assertEquals('one two', $actual);

        $actual = $truncater->truncate('one two', ['length' => '3']);
        $this->assertEquals('one...', $actual);

        $newTruncater = new Truncater(['length' => 3]);
        $actual = $newTruncater->truncate('one two');
        $this->assertEquals('one...', $actual);
    }
}
