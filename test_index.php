<?php

require_once __DIR__ . '/autoload.php';

use RandomUser\RandomUser;

$params = [
    'results'   => 10,
    'gender'    => 'male',
    'password'  => 'CHARSETS,MAX_LENGTH',
];
$randomUser = new RandomUser($params);
$getResult = $randomUser->get()->tojson();

echo "<pre>";
print_r( $getResult );