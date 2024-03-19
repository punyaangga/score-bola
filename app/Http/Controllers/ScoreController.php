<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScoreRequest;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{

    public function store(Request $request)
    {
        $id_clubs_1 = $request->id_clubs_1;
        $club_scores_1 = $request->club_scores_1;
        $id_clubs_2 = $request->id_clubs_2;
        $club_scores_2 = $request->club_scores_2;

        $dataToInsert = [];

        foreach ($id_clubs_1 as $index => $id_club_1) {
            $dataToInsert[] = [
                'id_clubs_1' => $id_club_1,
                'club_scores_1' => $club_scores_1[$index],
                'id_clubs_2' => $id_clubs_2[$index],
                'club_scores_2' => $club_scores_2[$index],
            ];
        }
        dd($dataToInsert);
        DB::table('scores')->insert($dataToInsert);
        // Score::insert($dataToInsert);

        return redirect()->route('master_data_clubs.index')->with('MessageFunction', 'Scores created successfully.');
    }
}
