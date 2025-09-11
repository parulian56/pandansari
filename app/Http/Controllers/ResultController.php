<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // ✅ tambahkan ini

class ResultController extends Controller
{
    public function index()
    {
        $results = DB::table('candidates')
            ->leftJoin('votes', 'candidates.id', '=', 'votes.candidate_id')
            ->select('candidates.id', 'candidates.name', DB::raw('COUNT(votes.id) as total_votes'))
            ->groupBy('candidates.id', 'candidates.name')
            ->orderByDesc('total_votes')
            ->get();

        return view('result', compact('results'));
    }
}
