<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MapController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Map/Map', [
            'maps' => Map::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Map/Map');
    }

   
    public function store(Request $request)
    {
        // dd($request);
       
        Map::create($request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
        ]));
        return redirect()->back();
        
    }

   
    public function show(Map $map)
    {
        //
    }

    
    public function edit(Map $map)
    {
        return Inertia::render('Map/Edit', [
            'map' => $map
        ]);
    }

    
    public function update(Request $request, Map $map)
    {
        $map->update($request->validate([
            'name' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'description' => 'required'
        ]));
        return Redirect::route('map');
    }

   
    public function destroy(Map $map)
    {
        $map->delete();
        return redirect()->back();
    }
}
