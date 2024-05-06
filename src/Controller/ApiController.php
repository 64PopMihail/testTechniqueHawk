<?php

namespace App\Controller;

use App\DataFetcher\EventsFetcher;
use App\Utils\CSVDataExtractor;

class ApiController
{
    private string $requestMethod;

    private array $requestBody;

    public function __construct(string $requestMethod, array $requestBody)
    {
        $this->requestMethod = $requestMethod;
        $this->requestBody = $requestBody;
    }

    public function processRequest(): void
    {
        switch ($this->requestMethod) {
            case 'GET':
                $pointsOfInterest = [];
                $events = CSVDataExtractor::extract('../events.csv');
                foreach ($this->requestBody as $pointOfInterest) {
                    $pointsOfInterest[$pointOfInterest['name']] = [...$pointOfInterest, 'impressions' => 0, 'clicks' => 0];
                }

                EventsFetcher::getEvents($pointsOfInterest, $events);
                $response = $pointsOfInterest;
                break;
            default:
                $response = [
                    "code" => 403,
                    "message" => "Methode non autorisée.",
                ];
                break;
        }

        echo json_encode($response);
    }
}