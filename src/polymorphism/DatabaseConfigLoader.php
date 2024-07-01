<?php

namespace Polymorphism;

class DatabaseConfigLoader
{
    private string $path;

    public function __construct($path)
    {
        $this->path = $path;
    }
/**
 *  Solution Polymorphism -> 4
 *
 * This method reads the JSON configuration file for the given environment, decodes it into an array,
 * and if the configuration extends another configuration file, it recursively merges them.
 *
 * @param   string  $env  The environment name (e.g., 'production', 'development').
 *
 * @return array|null The database configuration array or null if the configuration file does not exist.
 */
    public function load(string $env): ?array
    {
        $filename = "{$this->path}/database.{$env}.json";
        $raw = file_get_contents($filename);
        $config = (array) json_decode($raw);

        if (!isset($config['extend'])) {
            return $config;
        }
        $newName = $config['extend'];
        unset($config['extend']);
        return array_merge($this->load($newName), $config);
    }
}
