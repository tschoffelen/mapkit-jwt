<?php

/**
 * Copyright 2018 Includable
 * Created by Thomas Schoffelen
 */

use Mapkit\JWT;

require 'vendor/autoload.php';

// Replace arguments below with private key, key ID and team identifier
$my_token = JWT::getToken('-----BEGIN PRIVATE KEY----- ...', 'XXXXXXXXXX', 'XXXXXXXXXX');
echo $my_token;
