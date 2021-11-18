<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TestController
{
    public function __construct(private HttpClientInterface $client)
    {
    }

    /**
    * @Route("/foo", name="foo", methods={"GET"})
    */
    public function foo(): JsonResponse
    {
        $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/todos/1');
        return new JsonResponse($response->toArray());
    }
}
