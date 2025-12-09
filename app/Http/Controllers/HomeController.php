<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Prize;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        // Handle search
        if ($request->has('search') && $request->search_string) {
            $query->where('NAME_MOVIE', 'like', '%' . $request->search_string . '%');
        }

        // Handle filters
        if ($request->has('show')) {
            // Language filter
            if ($request->language) {
                $query->where('LANGUAGE_MOBIE', $request->language);
            }

            // Genre filter
            if ($request->genre) {
                $query->whereHas('genres', function($q) use ($request) {
                    $q->where('genre.ID', $request->genre);
                });
            }

            // Era filter (decade)
            if ($request->era) {
                $startYear = $request->era;
                $endYear = $request->era + 9;
                $query->whereBetween('YEAR', [$startYear, $endYear]);
            }

            // Prize filter
            if ($request->prize) {
                $query->where(function($q) use ($request) {
                    $q->whereHas('actors.moviePrizes', function($subQ) use ($request) {
                        $subQ->where('prize.ID', $request->prize);
                    });
                });
            }
        }

        $movies = $query->get();

        // Get filter options
        $genres = Genre::all();
        $languages = Movie::select('LANGUAGE_MOBIE')
            ->distinct()
            ->whereNotNull('LANGUAGE_MOBIE')
            ->where('LANGUAGE_MOBIE', '!=', '')
            ->get();
        $prizes = Prize::all();

        // Get advertisements
        $advertisements = Advertisement::all();

        return view('home', compact('movies', 'genres', 'languages', 'prizes', 'advertisements'));
    }
}
