<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    public function show($id)
    {
        $director = Director::with(['movies', 'series'])->findOrFail($id);

        $user = Auth::user();

        $movie_count = $director->movies()->count();
        $series_count = $director->series()->count();

        // Get prizes from director_prize_movie and director_prize_series tables
        $prizes = collect();
        try {
            $moviePrizes = DB::table('director_prize_movie')
                ->join('prize', 'director_prize_movie.PRIZE_ID', '=', 'prize.ID')
                ->join('movie', 'director_prize_movie.MOVIE_ID', '=', 'movie.ID')
                ->where('director_prize_movie.DIRECTOR_ID', $id)
                ->select('prize.*', 'director_prize_movie.YEAR', 'movie.NAME_MOVIE as work_name', DB::raw("'movie' as work_type"))
                ->get();

            $seriesPrizes = DB::table('director_prize_series')
                ->join('prize', 'director_prize_series.PRIZE_ID', '=', 'prize.ID')
                ->join('series', 'director_prize_series.SERIES_ID', '=', 'series.ID')
                ->where('director_prize_series.DIRECTOR_ID', $id)
                ->select('prize.*', 'director_prize_series.YEAR', 'series.NAME_SERIES as work_name', DB::raw("'series' as work_type"))
                ->get();

            $prizes = $moviePrizes->merge($seriesPrizes);
        } catch (\Exception $e) {
            $prizes = collect();
        }

        $adv = null;
        try {
            $advCount = DB::table('advertisement')->count();
            if ($advCount > 0) {
                $randomId = rand(1, $advCount);
                $adv = DB::table('advertisement')->find($randomId);
            }
        } catch (\Exception $e) {
            $adv = null;
        }

        return view('director', compact('director', 'user', 'movie_count', 'series_count', 'prizes', 'adv'));
    }
}
