<?php

namespace Polymorphism\HTML;

//use Tightenco\Collect\Support\Collection;
use Illuminate\Support\Collection;

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

function buildAtts(array $tag)
{
    return collect($tag)->except('name', 'tagType', 'body')
        ->map(fn($value, $key) => " {$key}=\"{$value}\"")->join('');
}

function stringify(array $tag)
{
    $attrs = buildAtts($tag);

    $mapping = [
        'single' =>
            fn($tag) => "<{$tag['name']}{$attrs}>",
        'pair' =>
            fn($tag) => "<{$tag['name']}{$attrs}>{$tag['body']}</{$tag['name']}>"
    ];
    $build = $mapping[$tag['tagType']];
    return $build($tag);
}
