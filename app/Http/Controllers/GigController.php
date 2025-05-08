<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;


class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $gigs = Gig::latest()->paginate(9);
    return view('gigs.index', compact('gigs'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'freelancer') {
            abort(403, 'Only freelancers can create gigs.');
        }
        return view('gigs.create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:5',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $gig = new Gig();
    $gig->user_id = Auth::id();
    $gig->title = $request->title;
    $gig->slug = Str::slug($request->title) . '-' . Str::random(6); // Slug
    $gig->description = $request->description;
    $gig->price = $request->price;

    if ($request->hasFile('thumbnail')) {
        $path = $request->file('thumbnail')->store('gigs', 'public');
        $gig->thumbnail = $path;
    }

    $gig->save();

    return redirect()->route('gigs.index')->with('success', 'Gig created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show($slug)
{
    $gig = Gig::where('slug', $slug)->firstOrFail();
    return view('gigs.show', compact('gig'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gig $gig)
    {
        // Authorize
        if ($gig->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('gigs.edit', compact('gig'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gig $gig)
    {
        // Authorize
        if ($gig->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete
        $gig->delete();

        return redirect()
            ->route('gigs.index')
            ->with('success', 'Gig deleted successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    

     public function update(Request $request, Gig $gig)
    {
        // Ensure the authenticated user owns this gig
        if ($gig->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validate input (note: use 'thumbnail' consistently)
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:5',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle new thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('gigs', 'public');
        }

        // Update the gig
        $gig->update($validated);

        return redirect()
            ->route('gigs.show', $gig->slug)
            ->with('success', 'Gig updated successfully!');
    }

     
    public function myGigs()
    {
        $userId = Auth::id();
    
        // Query gigs directly by user_id without using $user->gigs()
        $gigs = Gig::where('user_id', $userId)->paginate(5);
    
        return view('dashboard1.mygigs', compact('gigs'));
    }
    

    





}
