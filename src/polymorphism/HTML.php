<?php

namespace Polymorphism\HTML;

function getLinks(array $tags): ?array
{
    $mapping = [
        'a' => 'href',
        'img' => 'src',
        'link' => 'href'
    ];
    $filteredArray = array_filter($tags, function ($tag) use ($mapping) {
        return array_key_exists($tag['name'], $mapping);
    });

    $mappedArray = array_map(function ($tag) use ($mapping) {
        $attributeName = $mapping[$tag['name']];
        return $tag[$attributeName];
    }, $filteredArray);
    return array_values($mappedArray);
}
