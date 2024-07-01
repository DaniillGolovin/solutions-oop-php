<?php

namespace Polymorphism\HTML;

use Illuminate\Support\Collection;

/**
 * Solution Polymorphism -> 2
 *
 *The function retrieves links from an array of tags by key
 *
 * @param   array  $tags  The array of tags to process.
 *
 * @return array|null An array of extracted attribute values.
 */
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

/**
 * Solution Polymorphism -> 3
 *
 * This function removes specific keys ('name', 'tagType', 'body') from the input array
 * and then maps the remaining key-value pairs to a string of HTML attributes.
 *
 * @param   array  $tag  The associative array of HTML tag attributes.
 *
 * @return string The string of HTML attributes.
 */
function buildAtts(array $tag)
{
    return collect($tag)->except('name', 'tagType', 'body')
        ->map(fn($value, $key) => " {$key}=\"{$value}\"")->join('');
}

/**
 * Solution Polymorphism -> 3
 *
 * This function determines if the tag is a 'single' or 'pair' tag and constructs
 * the appropriate HTML string. 'Single' tags are self-closing, while 'pair' tags
 * have an opening and closing tag with content in between.
 *
 * @param array  $tag  The associative array of HTML tag attributes.
 *
 * @return array|null The string of HTML attributes.
 */
function stringify(array $tag): ?array
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
