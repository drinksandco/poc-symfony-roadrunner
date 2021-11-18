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
        $response = $this->client->request('GET', 'http://external_api:8080/');
        return new JsonResponse($response->toArray());
    }
}
