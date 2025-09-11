<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        // Query join ke tabel candidates & votes
        $results = DB::table('candidates')
            ->leftJoin('votes', 'candidates.id', '=', 'votes.candidate_id')
            ->select('candidates.id', 'candidates.name', DB::raw('COUNT(votes.id) as total_votes'))
            ->groupBy('candidates.id', 'candidates.name')
            ->orderByDesc('total_votes')
            ->get();

        // lempar ke view result.blade.php
        return view('result', compact('results'));
    }
}
