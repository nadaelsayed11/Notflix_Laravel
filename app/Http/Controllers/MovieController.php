<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display the specified movie page
     */
    public function show($id)
    {
        // Get movie with relationships
        $movie = Movie::with(['actors'])->findOrFail($id);

        // Get authenticated user
        $user = Auth::user();

        // Get Notflix user ratings
        $rateData = DB::table('rate_movie')
            ->where('MOVIE_ID', $id)
            ->selectRaw('COUNT(*) as count, AVG(RATE) as avg_rate')
            ->first();

        $notflix_rate_count = $rateData->count ?? 0;
        $notflix_avg_rate = $rateData->avg_rate ?? 0;

        // Return view with data
        return view('movie', compact('movie', 'user', 'notflix_rate_count', 'notflix_avg_rate'));
    }
}
