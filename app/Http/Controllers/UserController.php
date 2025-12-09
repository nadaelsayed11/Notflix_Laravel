<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Movie;
use App\Models\Series;

class UserController extends Controller
{
    /**
     * Show user profile/dashboard
     */
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        // Get user's favorite movies and series
        $favoriteMovies = $user->favoriteMovies;
        $favoriteSeries = $user->favoriteSeries;

        return view('user.profile', compact('user', 'favoriteMovies', 'favoriteSeries'));
    }

    /**
     * Show edit profile page
     */
    public function editProfile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        return view('user.edit-profile', compact('user'));
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        $request->validate([
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'age' => 'nullable|integer|min:0|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update email if provided
        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update age if provided
        if ($request->filled('age')) {
            $user->age = $request->age;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/user_pics'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Add movie to favorites
     */
    public function addMovieToFavorites($movieId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        // Check if movie exists
        $movie = Movie::find($movieId);
        if (!$movie) {
            return back()->with('error', 'Movie not found');
        }

        // Add to favorites if not already added
        if (!$user->favoriteMovies()->where('MOVIE_ID', $movieId)->exists()) {
            $user->favoriteMovies()->attach($movieId);
            return back()->with('success', 'Movie added to favorites!');
        }

        return back()->with('info', 'Movie already in favorites');
    }

    /**
     * Remove movie from favorites
     */
    public function removeMovieFromFavorites($movieId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        $user->favoriteMovies()->detach($movieId);

        return back()->with('success', 'Movie removed from favorites!');
    }

    /**
     * Add series to favorites
     */
    public function addSeriesToFavorites($seriesId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        // Check if series exists
        $series = Series::find($seriesId);
        if (!$series) {
            return back()->with('error', 'Series not found');
        }

        // Add to favorites if not already added
        if (!$user->favoriteSeries()->where('SERIES_ID', $seriesId)->exists()) {
            $user->favoriteSeries()->attach($seriesId);
            return back()->with('success', 'Series added to favorites!');
        }

        return back()->with('info', 'Series already in favorites');
    }

    /**
     * Remove series from favorites
     */
    public function removeSeriesFromFavorites($seriesId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('signin');
        }

        $user->favoriteSeries()->detach($seriesId);

        return back()->with('success', 'Series removed from favorites!');
    }
}
