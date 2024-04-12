<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class ControllerJson
{   
    #[Route("/api")]
    public function api(): Response
    {
        $routes = [
            ['route' => '/api', 'description' => 'Landing page for API'],
            ['route' => '/api/quote', 'description' => 'Get today\'s quote']
        ];

        $response = new JsonResponse($routes);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
    #[Route("/api/quote")]
    public function quote(): Response
    {
        $quotes = [
            "He who knows all the answers has not been asked all the questions.",
            "One original thought is worth a thousand mindless quotings.",
            "He has the most who is most content with the least."
        ];

        $randomQuote = $quotes[array_rand($quotes)];
        $currentDate = date('Y-m-d');
        $timestamp = time();
        $dateTime = new DateTime();
        $dateTime->setTimestamp($timestamp);
        $formattedTimestamp = $dateTime->format('Y-m-d H:i:s');

        $data = [ 'quote' => $randomQuote,
        'date' => $currentDate,
        'timestamp' => $formattedTimestamp];
        
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }


    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
