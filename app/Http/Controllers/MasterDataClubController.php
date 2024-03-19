<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterDataClubRequest;
use App\Models\MasterDataClub;
use App\Models\Score;

class MasterDataClubController extends Controller
{
    public function index(){
        $data_clubs = MasterDataClub::select('id','name_clubs')->get();

        $data = [];
        foreach ($data_clubs as $club) {
            // Menghitung jumlah pertandingan yang dimainkan oleh klub
            $jumlahMain = Score::where('id_clubs_1', $club->id)
                               ->orWhere('id_clubs_2', $club->id)
                               ->count();
        
            // Menghitung total poin, menang, seri, kalah, dan total gol
            $menang = Score::where(function ($query) use ($club) {
                            $query->where('id_clubs_1', $club->id)
                                  ->whereColumn('club_scores_1', '>', 'club_scores_2');
                        })
                        ->orWhere(function ($query) use ($club) {
                            $query->where('id_clubs_2', $club->id)
                                  ->whereColumn('club_scores_2', '>', 'club_scores_1');
                        })
                        ->count();
        
            $seri = Score::where(function ($query) use ($club) {
                            $query->where('id_clubs_1', $club->id)
                                  ->whereColumn('club_scores_1', '=', 'club_scores_2');
                        })
                        ->orWhere(function ($query) use ($club) {
                            $query->where('id_clubs_2', $club->id)
                                  ->whereColumn('club_scores_2', '=', 'club_scores_1');
                        })
                        ->count();
        
            $kalah = $jumlahMain - $menang - $seri;
        
            $totalGolMenang = Score::where(function ($query) use ($club) {
                            $query->where('id_clubs_1', $club->id)
                                  ->whereColumn('club_scores_1', '>', 'club_scores_2');
                        })
                        ->orWhere(function ($query) use ($club) {
                            $query->where('id_clubs_2', $club->id)
                                  ->whereColumn('club_scores_2', '>', 'club_scores_1');
                        })
                        ->sum('club_scores_1');
        
            $totalGolKalah = Score::where(function ($query) use ($club) {
                            $query->where('id_clubs_1', $club->id)
                                  ->whereColumn('club_scores_1', '<', 'club_scores_2');
                        })
                        ->orWhere(function ($query) use ($club) {
                            $query->where('id_clubs_2', $club->id)
                                  ->whereColumn('club_scores_2', '<', 'club_scores_1');
                        })
                        ->sum('club_scores_1');
            // Menghitung total poin
            $totalPoint = ($menang * 3) + ($seri * 1);
        
            $data[$club->name_clubs] = [
                'id_clubs' => $club->id,
                'Ma' => $jumlahMain,
                'Me' => $menang,
                'S' => $seri,
                'K' => $kalah,
                'GM' => $totalGolMenang,
                'GK' => $totalGolKalah,
                'Point' => $totalPoint
            ];
        }
        return view('MainMenu.Index', compact('data'));
    }
    public function store(MasterDataClubRequest $request)
    {
       MasterDataClub::create($request->all());
       return redirect()->route('master_data_clubs.index')->with('MessageFunction', 'Master Data Club created successfully.');
    }
}
