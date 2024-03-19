<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('id_clubs_1')->foreign('id_clubs')->references('id')->on('master_data_clubs');
            $table->integer('id_clubs_2')->foreign('id_clubs')->references('id')->on('master_data_clubs');
            $table->integer('club_scores_1');
            $table->integer('club_scores_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
