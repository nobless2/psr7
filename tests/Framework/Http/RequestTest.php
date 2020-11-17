<?

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest
{

    public function testEmpty(): void
    {
        $request = new Request();

        self::asserEquals([], $request->getQueryParams());
        self::asserNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $request = (new Request())
            ->withQueryParams($data = [
                'name' => 'John',
                'age' => 28
            ]);

        self::asserEquals([], $request->getQueryParams());
        self::asserNull($request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $request = (new Request())
            ->withParsedBody($data = [
                'title' => 'Title'
            ]);

        self::asserEquals([], $request->getQueryParams());
        self::asserNull($request->getParsedBody());
    }
}