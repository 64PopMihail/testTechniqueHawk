<?php

namespace App\DataFetcher;

class EventsFetcher
{
    public static function getEvents(array &$pointsOfInterest, array $events): void
    {
        foreach ($events as $event) {
            foreach ($pointsOfInterest as &$pointOfInterest) {
                if (round($pointOfInterest['lat'], 2) === round((float) $event['lat'], 2) &&
                    round($pointOfInterest['lon'], 2) === round((float) $event['lon'], 2)) {
                    if ($event['eventType'] === 'imp') {
                        $pointOfInterest['impressions'] += 1;
                    }
                    if ($event['eventType'] === 'click') {
                        $pointOfInterest['clicks'] += 1;
                    }
                }
            }
        }
    }
}