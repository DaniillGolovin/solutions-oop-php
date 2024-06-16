<?php

namespace App\Normalizer;

function normalize(array $raw)
{
    $result = [];

    foreach ($raw as $item) {
        $country = strtolower(trim($item['country']));
        $name = strtolower(trim($item['name']));

        if (!isset($result[$country])) {
            $result[$country] = [];
        }

        if (!in_array($name, $result[$country])) {
            $result[$country][] = $name;
        }
    }

    foreach ($result as &$cities) {
        sort($cities);
    }

    return $result;
}
