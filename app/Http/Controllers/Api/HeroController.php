<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HeroController extends Controller
{
    /**
     * Display a listing of all heroes.
     */
    public function index()
    {
        $heroes = Hero::where('is_active', true)->get();
        
        return response()->json([
            'success' => true,
            'data' => $heroes,
            'count' => $heroes->count(),
        ]);
    }

    /**
     * Store a newly created hero.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:heroes',
            'slug' => 'required|string|unique:heroes',
            'description' => 'nullable|string',
            'role' => 'required|string',
            'health' => 'required|integer',
            'speed' => 'required|integer',
            'attack_power' => 'required|numeric',
            'is_active' => 'boolean',
        ]);

        $hero = Hero::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Hero created successfully',
            'data' => $hero,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified hero.
     */
    public function show(string $id)
    {
        $hero = Hero::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $hero,
        ]);
    }

    /**
     * Update the specified hero.
     */
    public function update(Request $request, string $id)
    {
        $hero = Hero::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|unique:heroes,name,' . $id,
            'slug' => 'string|unique:heroes,slug,' . $id,
            'description' => 'nullable|string',
            'role' => 'string',
            'health' => 'integer',
            'speed' => 'integer',
            'attack_power' => 'numeric',
            'is_active' => 'boolean',
        ]);

        $hero->update(array_filter($validated));

        return response()->json([
            'success' => true,
            'message' => 'Hero updated successfully',
            'data' => $hero,
        ]);
    }

    /**
     * Remove the specified hero.
     */
    public function destroy(string $id)
    {
        $hero = Hero::findOrFail($id);
        $hero->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hero deleted successfully',
        ]);
    }
}
