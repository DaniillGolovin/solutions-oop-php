<?php

namespace Polymorphism\LinkedList;

use Polymorphism\Node;

/**
 * Solution Polymorphism -> 1
 *
 * This function takes the head node of a singly linked list and reverses the order
 * of nodes, returning the new head node of the reversed list.
 *
 * @param Node $list The head node of the singly linked list to be reversed.
 * @return Node The head node of the reversed singly linked list.
 */
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
