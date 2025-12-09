<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Genre;
use App\Models\Prize;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of series with filters
     */
    public function index(Request $request)
    {
        $query = Series::query();

        // Handle search
        if ($request->has('search') && $request->search_string) {
            $query->where('NAME_SERIES', 'like', '%' . $request->search_string . '%');
        }

        // Handle filters
        if ($request->has('show')) {
            // Language filter
            if ($request->language) {
                $query->where('LANGUAGE', $request->language);
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
                $query->where('PRIZE_WON_ID', $request->prize);
            }
        }

        $series = $query->get();

        // Get filter options
        $genres = Genre::all();
        $languages = Series::select('LANGUAGE')
            ->distinct()
            ->whereNotNull('LANGUAGE')
            ->where('LANGUAGE', '!=', '')
            ->get();
        $prizes = Prize::all();

        // Get advertisements
        $advertisements = Advertisement::all();

        return view('series-list', compact('series', 'genres', 'languages', 'prizes', 'advertisements'));
    }

    /**
     * Display the specified series page
     */
    public function show($id)
    {
        // Get series with relationships
        $series = Series::with(['actors'])->findOrFail($id);

        // Get authenticated user
        $user = Auth::user();

        // Get Notflix user ratings
        $rateData = DB::table('rate_series')
            ->where('SERIES_ID', $id)
            ->selectRaw('COUNT(*) as count, AVG(RATE) as avg_rate')
            ->first();

        $notflix_rate_count = $rateData->count ?? 0;
        $notflix_avg_rate = $rateData->avg_rate ?? 0;

        // Return view with data
        return view('series', compact('series', 'user', 'notflix_rate_count', 'notflix_avg_rate'));
    }
}
