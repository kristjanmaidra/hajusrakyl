<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;
use App\Models\User;
use App\Models\Weather;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class WeatherController extends Controller
{
    
    public function index()
    {
       $url = 'https://api.openweathermap.org/data/2.5/weather?lat=58.2&lon=22.5&appid=66455badace9b59499362bdf9e4c69e0&units'.config('services.weather.key');
    //    $url = 'https://api.openweathermap.org/data/2.5/weather?=kuressaare&units=metric&appid='.config('services.weather.key');

       $data = $this->cacheData($url);
       return Inertia::render('Weather', [
           'data' => $data
       ]);
    }

    
    private function cacheData($url)
    {
        if (!Cache::has('weather')) {
            $query = Http::get($url)->json();
            Cache::put('weather', $query, now()->addHour());
        }

        return Cache::get('weather');
    }

    
    public function store(StoreWeatherRequest $request)
    {
        //
    }

    
    public function show(Weather $weather)
    {
        //
    }

    public function edit(Weather $weather)
    {
        //
    }

   
    public function update(UpdateWeatherRequest $request, Weather $weather)
    {
        //
    }

   
    public function destroy(Weather $weather)
    {
        //
    }
}
