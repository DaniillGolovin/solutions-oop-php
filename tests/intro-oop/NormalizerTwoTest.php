<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\NormalizerTwo\getQuestions;

class NormalizerTwoTest extends TestCase
{
    public function testNormalizerTwo()
    {
        $text = <<<HEREDOC
            lala\r\nr
            ehu?\t
            vie?eii
            \n \t
            i see you
            /r \n
            one two?\r\n\n
            turum-purum
            HEREDOC;
        $result = getQuestions($text);
        $this->assertEquals("ehu?\none two?", $result);
    }
}
