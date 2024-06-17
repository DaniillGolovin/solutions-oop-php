<?php

namespace App\NormalizerTwo;

use function Symfony\Component\String\s;

function getQuestions(string $text): string
{
    $result = collect(s($text)->split("\n"))
        ->map(fn($line) => $line->trim())
        ->filter(fn ($line) => $line->endsWith('?'))
        ->toArray();
    return implode("\n", $result);
}
