<?php

namespace App\Utils;

class CSVDataExtractor
{
    public static function extract(string $filePath): array
    {
        $file = fopen($filePath, 'r');

        $events = [];
        $i = 0;

        while (($data = fgetcsv($file)) !== false) {
            $events[$i] = [
                'lat' => $data[0],
                'lon' => $data[1],
                'eventType' => $data[2],
            ];
            $i++;
        }
        fclose($file);

        //Enlève la ligne d'entête du CSV
        array_shift($events);

        return $events;
    }
}