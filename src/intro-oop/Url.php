<?php

namespace App;

class Url
{
    private $url;
    private $queryParams;

    public function __construct(string $url)
    {
        $this->url = parse_url($url);
        $this->queryParams = [];

        if (isset($this->url['query'])) {
            parse_str($this->url['query'], $this->queryParams);
        }
    }

    public function getScheme()
    {
        return $this->url['scheme'];
    }

    public function getHostName()
    {
        return $this->url['host'];
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getQueryParam($key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    public function equals(Url $url)
    {
        return $this == $url;
    }
}
