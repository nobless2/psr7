<?

use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

### Initialization

$request = RequestFactory::fromGlobals();

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new Response('Hello, ' . $name . '!'))
    ->withHeaders('X-Developer', 'nobless2');

### Sending

header(('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase()));

foreach ($response->getHeaders as $name=>$value) {
    header($name . ':' . $value);
}

echo $response->getBody();