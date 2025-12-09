<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    /**
     * Display the specified actor page
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Get actor with relationships
        $actor = Actor::with(['movies', 'series'])
            ->findOrFail($id);

        // Get authenticated user
        $user = Auth::user();

        // Calculate movie count
        $movie_count = $actor->movies()->count();

        // Get all prizes (from both movies and series)
        $prizes = collect();
        try {
            $moviePrizes = DB::table('actor_prize_movie')
                ->join('prize', 'actor_prize_movie.PRIZE_ID', '=', 'prize.ID')
                ->join('movie', 'actor_prize_movie.MOVIE_ID', '=', 'movie.ID')
                ->where('actor_prize_movie.ACTOR_ID', $id)
                ->select('prize.*', 'actor_prize_movie.YEAR', 'movie.NAME_MOVIE as work_name', DB::raw("'movie' as work_type"))
                ->get();

            $seriesPrizes = DB::table('actor_prize_series')
                ->join('prize', 'actor_prize_series.PRIZE_ID', '=', 'prize.ID')
                ->join('series', 'actor_prize_series.SERIES_ID', '=', 'series.ID')
                ->where('actor_prize_series.ACTOR_ID', $id)
                ->select('prize.*', 'actor_prize_series.YEAR', 'series.NAME_SERIES as work_name', DB::raw("'series' as work_type"))
                ->get();

            $prizes = $moviePrizes->merge($seriesPrizes);
        } catch (\Exception $e) {
            $prizes = collect();
        }

        // Get random advertisement
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

        // Return view with data
        return view('actor', compact('actor', 'user', 'movie_count', 'prizes', 'adv'));
    }
}
