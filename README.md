# HTTP REQUEST WRAPPER

A Simple HTTP Request Wrapper

## Installation

```bash
composer require bera/request
```

## Usage

for a get request

```php
require 'vendor/autoload.php';

use Bera\Request\Request;

$url = 'https://jsonplaceholder.typicode.com/posts';
$request = new Request('GET',$url);
print_r($request->response());
print_r($request->responseAsArray()); // for response as an array
```

for a post request

```php
require 'vendor/autoload.php';

use Bera\Request\Request;

$url = 'https://jsonplaceholder.typicode.com/posts';
$payload = array(
    'title' => 'foo',
    'body' => 'bar',
    'userId' => 1
);
$request = new Request('POST',$url);
$request->attachPayLoad($payload);
print_r($request->responseAsArray()); // for response as an array
```

## License
This software under MIT license