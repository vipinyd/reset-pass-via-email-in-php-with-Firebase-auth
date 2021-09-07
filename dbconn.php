<?php
// remote database connection of firebase and keys
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;

$factory = (new Factory)
    ->withServiceAccount('fir-auth-fdd3c-firebase-adminsdk-8dt24-cd444dc0f4.json')
    ->withDatabaseUri('https://fir-auth-fdd3c-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();
    $auth = $factory->createAuth();
?>