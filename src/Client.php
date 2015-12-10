<?php
namespace Delicious;

class Client
{
    public $accessToken;
    protected $baseUri = 'https://api.del.icio.us/v1/';

    protected function options()
    {
        return [
            'headers' => ['Authorization' => "Bearer {$this->accessToken}"]
        ];
    }

    public function getRecentPosts()
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->baseUri]);
        $response = $client->request('GET', 'posts/recent', $this->options());
        $body = $response->getBody();

        return $body->getContents();
    }
}
