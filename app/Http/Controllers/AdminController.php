<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Series;
use App\Models\Advertisement;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Prize;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Get movies added by this admin
        $movies = Movie::where('ADMIN_INSERTED_MOVIE', $user->name)->get();

        // Get series added by this admin
        $series = Series::where('ADMIN_INSERTED_SERIES', $user->name)->get();

        // Get advertisements added by this admin
        $advertisements = Advertisement::where('ADMIN_ADDED', $user->name)->get();

        return view('admin.dashboard', compact('user', 'movies', 'series', 'advertisements'));
    }

    /**
     * Show the add movie form
     */
    public function showAddMovie()
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Get data for dropdowns
        $actors = Actor::orderBy('FNAME')->get();
        $directors = Director::orderBy('FNAME')->get();
        $genres = Genre::orderBy('GENRE_TYPE')->get();

        return view('admin.add-movie', compact('actors', 'directors', 'genres'));
    }

    /**
     * Store a new movie
     */
    public function storeMovie(Request $request)
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1800|max:' . (date('Y') + 10),
            'duration' => 'required|integer|min:1',
            'description' => 'required|string',
            'language' => 'required|string|max:100',
            'revenue' => 'nullable|numeric|min:0',
            'budget' => 'nullable|numeric|min:0',
            'homepage_link' => 'nullable|url',
            'poster' => 'nullable|url',
            'imdb_rate' => 'nullable|numeric|min:0|max:10',
            'imdb_rate_count' => 'nullable|integer|min:0',
            'director_id' => 'required|exists:director,ID',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actor,ID',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genre,ID',
        ]);

        // Create the movie
        $movie = Movie::create([
            'NAME_MOVIE' => $validated['title'],
            'YEAR' => $validated['year'],
            'DURATION_MIN' => $validated['duration'],
            'DESCRIPTION_OF_MOVIE' => $validated['description'],
            'LANGUAGE_MOBIE' => $validated['language'],
            'REVENUE' => $validated['revenue'] ?? null,
            'BUDGET' => $validated['budget'] ?? null,
            'HOME_PAGE_LINK' => $validated['homepage_link'] ?? null,
            'POSTER' => $validated['poster'] ?? null,
            'ADMIN_INSERTED_MOVIE' => $user->name,
            'IMDB_RATE' => $validated['imdb_rate'] ?? null,
            'IMDB_RATE_COUNT' => $validated['imdb_rate_count'] ?? null,
            'DIRECTOR_ID' => $validated['director_id'],
        ]);

        // Attach actors if provided
        if (!empty($validated['actors'])) {
            $movie->actors()->attach($validated['actors']);
        }

        // Attach genres if provided
        if (!empty($validated['genres'])) {
            $movie->genres()->attach($validated['genres']);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Movie added successfully!');
    }

    /**
     * Show the add series form
     */
    public function showAddSeries()
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Get data for dropdowns
        $actors = Actor::orderBy('FNAME')->get();
        $directors = Director::orderBy('FNAME')->get();
        $genres = Genre::orderBy('GENRE_TYPE')->get();

        return view('admin.add-series', compact('actors', 'directors', 'genres'));
    }

    /**
     * Store a new series
     */
    public function storeSeries(Request $request)
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1800|max:' . (date('Y') + 10),
            'duration' => 'required|integer|min:1',
            'episodes' => 'required|integer|min:1',
            'description' => 'required|string',
            'language' => 'required|string|max:100',
            'revenue' => 'nullable|numeric|min:0',
            'budget' => 'nullable|numeric|min:0',
            'homepage_link' => 'nullable|url',
            'poster' => 'nullable|url',
            'imdb_rate' => 'nullable|numeric|min:0|max:10',
            'imdb_rate_count' => 'nullable|integer|min:0',
            'director_id' => 'required|exists:director,ID',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actor,ID',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genre,ID',
        ]);

        // Create the series
        $series = Series::create([
            'NAME_SERIES' => $validated['title'],
            'YEAR' => $validated['year'],
            'DURATION_MIN' => $validated['duration'],
            'NUMBER_OF_EPISODES_IN_SEASON' => $validated['episodes'],
            'DESCRIPTION' => $validated['description'],
            'LANGUAGE' => $validated['language'],
            'REVENUE' => $validated['revenue'] ?? null,
            'BUDGET' => $validated['budget'] ?? null,
            'HOME_PAGE_LINK' => $validated['homepage_link'] ?? null,
            'POSTER' => $validated['poster'] ?? null,
            'ADMIN_INSERTED_SERIES' => $user->name,
            'IMDB_RATE' => $validated['imdb_rate'] ?? null,
            'IMDB_RATE_COUNT' => $validated['imdb_rate_count'] ?? null,
            'DIRECTOR_ID' => $validated['director_id'],
        ]);

        // Attach actors if provided
        if (!empty($validated['actors'])) {
            $series->actors()->attach($validated['actors']);
        }

        // Attach genres if provided
        if (!empty($validated['genres'])) {
            $series->genres()->attach($validated['genres']);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Series added successfully!');
    }

    /**
     * Show the add actor form
     */
    public function showAddActor()
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        return view('admin.add-actor');
    }

    /**
     * Store a new actor
     */
    public function storeActor(Request $request)
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date|before:today',
            'image' => 'nullable|url',
        ]);

        // Create the actor
        Actor::create([
            'FNAME' => $validated['first_name'],
            'LNAME' => $validated['last_name'],
            'GENDER' => $validated['gender'],
            'BIRTH_DATE' => $validated['birth_date'],
            'IMAGE' => $validated['image'] ?? null,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Actor added successfully!');
    }

    /**
     * Show the add director form
     */
    public function showAddDirector()
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        return view('admin.add-director');
    }

    /**
     * Store a new director
     */
    public function storeDirector(Request $request)
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date|before:today',
            'image' => 'nullable|url',
        ]);

        // Create the director
        Director::create([
            'FNAME' => $validated['first_name'],
            'LNAME' => $validated['last_name'],
            'GENDER' => $validated['gender'],
            'BIRTH_DATE' => $validated['birth_date'],
            'IMAGE' => $validated['image'] ?? null,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Director added successfully!');
    }

    /**
     * Show the add prize form
     */
    public function showAddPrize()
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        return view('admin.add-prize');
    }

    /**
     * Store a new prize
     */
    public function storePrize(Request $request)
    {
        // Check if user is admin
        $user = Auth::user();

        if (!$user || $user->type !== 'admin') {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }

        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
        ]);

        // Create the prize
        Prize::create([
            'TITLE' => $validated['title'],
            'TYPE_OF_PRIZE' => $validated['type'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Prize added successfully!');
    }
}
