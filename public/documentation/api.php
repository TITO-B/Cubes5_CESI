<?php
require dirname(__DIR__). "../../vendor/autoload.php";

$openapi = \OpenApi\Generator::scan('../../App/Controllers');

header('Content-Type: application/json');
echo $openapi->toJSON();