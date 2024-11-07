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
    //Valida los datos y lo a;ade a la bd
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
        return view("activities.show", ['activity' => Activity::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("activities.edit", ['activity' => Activity::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::findOrFail($id);

        $request->validate([
            'type' => ['required', 'string'],
            'datetime' => ['required', 'string'],
            'notes' => ['required', 'string'],
        ]);

        $activity->update([
            'type' => $request->input('type'),
            'datetime' => $request->input('datetime'),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->route('activities.show', $activity->id)
                         ->with('success', 'Actividad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);

        $activity->delete();

        return redirect()->route('activities.index')
                         ->with('success', 'Actividad eliminada correctamente.');
}
}
