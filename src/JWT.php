<?php

/**
 * Copyright 2018 Includable
 * Created by Thomas Schoffelen
 */

namespace Mapkit;

/**
 * Class JWT
 *
 * @package Mapkit
 */
class JWT
{
    /**
     * Generates a JWT token that can be used for MapKit JS or MusicKit authorization.
     *
     * @param string $private_key Contents of, or path to, private key file
     * @param string $key_id Key ID provided by Apple
     * @param string $team_id Apple Developer Team Identifier
     * @param string $origin Optionally limit header origin
     * @param integer $expiry The expiry timeout in seconds (defaults to 3600)
     * @return string|false
     */
    public static function getToken($private_key, $key_id, $team_id, $origin = null, $expiry = 3600)
    {
        $header = [
            'alg' => 'ES256',
            'typ' => 'JWT',
            'kid' => $key_id
        ];
        $body = [
            'iss' => $team_id,
            'iat' => time(),
            'exp' => time() + $expiry
        ];

        if ($origin) {
            $body['origin'] = $origin;
        }

        $payload = self::encode(json_encode($header)) . '.' . self::encode(json_encode($body));

        if (!$key = openssl_pkey_get_private($private_key)) {
            return false;
        }

        if (!openssl_sign($payload, $result, $key, OPENSSL_ALGO_SHA256)) {
            return false;
        }

        return $payload . '.' . self::encode($result);
    }

    /**
     * URL-safe base64 encoding.
     *
     * @param string $data
     * @return string
     */
    private static function encode($data)
    {
        $encoded = strtr(base64_encode($data), '+/', '-_');

        return rtrim($encoded, '=');
    }
}
