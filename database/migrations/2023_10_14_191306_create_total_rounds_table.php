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
        Schema::create('total_rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->integer('team_id');
            $table->string('team_name');
            $table->integer('kill');
            $table->integer('point');
            $table->integer('match_point_winner')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_rounds');
    }
};
