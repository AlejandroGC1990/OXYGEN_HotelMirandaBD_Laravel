<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("activities.index", ['activities' => Auth::user() -> activities() -> get()]);                                                   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("activities.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => ['required', 'string'],
            'datetime' => ['required', 'string'],
            'notes' => ['required', 'string'],
        ]);

        Activity::create([
            'type' => $request->input('type'),
            'user_id' => $request->user()->id,
            'datetime' => $request->input('datetime'),
            'notes' => $request->input('notes'),
        ]);

        return redirect(route("activities.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("activities.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("activities.edit");
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
