<?php

require('vendor/autoload.php');

use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost/joomla_git/jomres/api/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$response = $client->request('GET', 'echo');

var_dump($response);
