<?php

namespace App\Http\Controllers;

use App\Models\BusinessSettings;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Checks if a search was requested
        if (isset($request->search)) {
            return view("exhibition.index", [
                'exhibitions' => Exhibition::where('exhibition_name', 'LIKE', "%{$request->search}%")->get(),
                'business' => BusinessSettings::find(ProfileController::$businessTableId),
            ]);
        }

        // base view
        return view("exhibition.index", [
            'exhibitions' => Exhibition::all(),
            'business' => BusinessSettings::find(ProfileController::$businessTableId),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
