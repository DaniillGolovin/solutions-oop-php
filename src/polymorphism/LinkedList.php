<?php

namespace Polymorphism\LinkedList;

use Polymorphism\Node;

function reverse(Node $list): Node
{
    $reversedList = null;
    $current = $list;
    while ($current) {
        $reversedList = new Node($current->getValue(), $reversedList);
        $current = $current->getNext();
    }

    return $reversedList;
}
