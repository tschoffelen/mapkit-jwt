# MapKit JWT

**Simple PHP class to quickly generate MapKit JS JWT tokens.**

## Install

```
composer require mapkit/jwt
```

## Usage

```php
use Mapkit\JWT;

// Replace arguments below with private key, key ID and team identifier
$my_token = JWT::getToken('-----BEGIN PRIVATE KEY----- ...', 'XXXXXXXXXX', 'XXXXXXXXXX');
echo $my_token;
```

## More info

* [Apple Developer documentation](https://developer.apple.com/maps/mapkitjs/)

## License

This project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Authors

This library is developed by [Includable](https://includable.com/), a creative app and web platform
development agency based in Amsterdam, The Netherlands.

* Thomas Schoffelen, [@tschoffelen](https://twitter.com/tschoffelen)
