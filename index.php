<?php

require __DIR__ . '/vendor/autoload.php';

use App\Truncater;
//$newPasswordValidator = new \App\PasswordValidator();

$newTruncater = new Truncater();

$truncated = $newTruncater->truncate('one two');
var_dump($truncated);
$truncated = $newTruncater->truncate('one two', ['length' => 6]);
var_dump($truncated);
$truncated = $newTruncater->truncate('one two', ['separator' => '.']);
var_dump($truncated);
$truncated = $newTruncater->truncate('one two', ['length' => '3']);
var_dump($truncated);

$truncated = new Truncater(['length' => '3']);
$actual = $truncated->truncate('one two');
var_dump($actual);