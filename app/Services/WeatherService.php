<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherService
{
    protected $api_key;

    public function __construct()
    {
        $this->api_key = env('STORMGLASS_API_KEY');
    }

    public function getWeather($latitude, $longitude)
    {
        $cache_key = "weather_{$latitude}_{$longitude}";
        return Cache::remember($cache_key, 3600, function () use ($latitude, $longitude) {
            $response = Http::withHeaders([
                'Authorization' => $this->api_key,
            ])->get('https://api.stormglass.io/v2/weather/point', [
                'lat' => $latitude,
                'lng' => $longitude,
                'params' => 'airTemperature',
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        });
    }
}
