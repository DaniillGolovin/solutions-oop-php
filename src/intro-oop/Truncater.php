<?php

namespace App;

class Truncater
{
    public const OPTIONS = [
        'separator' => '...',
        'length' => 200,
        ];

    public $options = [];

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function truncate(string $string, array $options = []): string
    {
        $currentOptions = array_merge($this->options, $options);
        $subString = mb_substr($string, 0, $currentOptions['length']);
        if (mb_strlen($subString) !== mb_strlen($string)) {
            $subString .= $currentOptions['separator'];
        }
        return $subString;
    }
}
