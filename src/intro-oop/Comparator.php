<?php

namespace App\Comparator;

function compare(string $stringOne, string $stringTwo): bool
{
    return hashtagsCleaner($stringOne) == hashtagsCleaner($stringTwo);
}

function hashtagsCleaner(string $expression)
{
    $stack = new \Ds\Stack();
    for ($i = 0; $i < strlen($expression); $i++) {
        $curr = $expression[$i];
        if ($curr !== '#') {
            $stack->push($curr);
        } elseif (!$stack->isEmpty()) {
            $stack->pop();
        }
    }
    return $stack->toArray();
}
