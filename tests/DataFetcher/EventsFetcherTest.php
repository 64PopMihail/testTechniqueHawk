<?php

namespace App\Tests\DataFetcher;

use App\DataFetcher\EventsFetcher;
use PHPUnit\Framework\TestCase;

class EventsFetcherTest extends TestCase
{
    public function testGetEvents(): void
    {
        $pointsOfInterest = [
            ['lat' => 48.875, 'lon' => 2.348, 'name' => 'Tour Eiffel' , 'impressions' => 0, 'clicks' => 0],
            ['lat' => 48.86, 'lon' => 2.35, 'name' => 'Montmartre', 'impressions' => 0, 'clicks' => 0]
        ];

        $events = [
            ['lat' => 48.87512, 'lon' => 2.34842, 'eventType' => 'click'],
            ['lat' => 48.860234, 'lon' => 2.3501234, 'eventType' => 'imp'],
            ['lat' => 48.8751113, 'lon' => 2.3482224, 'eventType' => 'imp'],
            ['lat' => 48.860223, 'lon' => 2.350213, 'eventType' => 'click'],
        ];

        EventsFetcher::getEvents($pointsOfInterest, $events);
        $result = $pointsOfInterest;

        $this->assertSameSize($pointsOfInterest, $result);


        foreach ($pointsOfInterest as $pointOfInterest) {
            $this->assertIsInt($pointOfInterest['impressions']);
            $this->assertIsInt($pointOfInterest['clicks']);
            $this->assertSame(1, $pointOfInterest['impressions']);
            $this->assertSame(1, $pointOfInterest['clicks']);
        }
    }
}
