<?php
require("../../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT'].'/CUBES5_CESI/App/Controllers']);

header('Content-Type: application/json');
echo $openapi->toJSON();