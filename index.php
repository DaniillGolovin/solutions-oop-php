<?php

$newPasswordValidator = new \App\PasswordValidator();

$newTruncatler = new \App\Truncater('one two');
$TruncutlerO = $newTruncatler->truncate();