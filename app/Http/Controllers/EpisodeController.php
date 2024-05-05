<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Show;

class EpisodeController extends Controller
{
    // Show the form to create a new episode
    public function create()
    {
        $shows = Show::all();
        return view('episodes.create', compact('shows'));
    }

    // Show a specific episode
    public function show(Episode $episode)
    {
        if (auth()->check()) {
            // User is authenticated, show the episode
            return view('episodes.show', compact('episode'));
        } else {
            // User is not authenticated, redirect to login page
            return redirect()->route('login')->with('error', 'You need to login to view this episode.');
        }
    }

    // Update an existing episode
    public function update(Request $request, Episode $episode)
    {
        // Update the episode with the provided data
        $episode->update($request->all());
        
        // Redirect the user back with a success message after updating the episode
        return redirect()->back()->with('success', 'Episode updated successfully!');
    }

    // Store a newly created episode
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'show_id' => 'required|exists:shows,id',
            'episode_title' => 'required',
            'episode_description' => 'required',
            'episode_duration' => 'required',
            'episode_airing_time' => 'required',
            'episode_thumbnail' => 'required',
            'episode_trailer_url' => 'required',
        ]);
    
        // Create a new episode with the validated data
        $episode = new Episode([
            'show_id' => $validatedData['show_id'],
            'title' => $validatedData['episode_title'],
            'description' => $validatedData['episode_description'],
            'duration' => $validatedData['episode_duration'],
            'airing_time' => $validatedData['episode_airing_time'],
            'thumbnail_url' => $validatedData['episode_thumbnail'],
            'video_trailer_url' => $validatedData['episode_trailer_url'],
        ]);
    
        // Save the newly created episode
        $episode->save();
    
        // Redirect the user to the appropriate page with a success message after creating the episode
        return redirect()->route('shows.index')->with('success', 'Episode created successfully!');
    }

    // Delete an existing episode
    public function destroy(Episode $episode)
    {
        // Delete the specified episode
        $episode->delete();

        // Redirect the user to the appropriate page with a success message after deleting the episode
        return redirect()->route('admin.series.episodes', ['series' => $episode->show_id])
            ->with('success', 'Episode deleted successfully!');
    }
}
