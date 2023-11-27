<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get() 
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
        // Validate the request
        $validated =  $request->validate([
            'message' => ['required', 'min:5', 'max:255']
        ]);

        $request->user()->chirps()->create($validated);
        
        // Create a session that will be available on the next request only
        session()->flash('success', __('Chirp published successfully'));
        return to_route('chirps.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', [
            'chirp' => $chirp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        // Validate the request
        $validated =  $request->validate([
            'message' => ['required', 'min:5', 'max:255']
        ]);

        // Update the chirp
        $chirp->update($validated);

        return to_route('chirps.index')
            ->with('success', __('Chirp updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
