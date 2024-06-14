<?php

namespace App\Converter;

function toStd(array $am): object
{
    $obj = new \stdClass();
    foreach ($am as $key => $value) {
        $obj->$key = $value;
    }
    return $obj;
}
