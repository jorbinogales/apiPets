<?php

require($_SERVER['DOCUMENT_ROOT']."/apipets/vendor/autoload.php");
$openapi = \OpenApi\scan($_SERVER['DOCUMENT_ROOT'].'/apipets/app/Http/Controllers');
header('Content-Type: application/json');
echo $openapi->toJSON();