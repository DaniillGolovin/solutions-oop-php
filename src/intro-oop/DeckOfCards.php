<?php

namespace App;

class DeckOfCards
{
    public array $deck = [];

    public function __construct(array $cards)
    {
        $this->deck = $cards;
    }

    public function getShuffled()
    {
        $collection = collect($this->deck);

        $complectCards = $collection->flatMap(function ($value) {
            return array_fill(0, 4, $value);
        });

        $result = $complectCards->all();
        shuffle($result);

        return $result;
    }
}
