<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = ['id_clubs_1', 'club_scores_1','id_clubs_2','club_scores_2'];

    
    
}
