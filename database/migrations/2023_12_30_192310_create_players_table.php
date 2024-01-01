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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('position', ['Goalkeeper', 'Defender', 'Midfielder', 'Forward','Useless','Injured'])->default('Useless');
            $table->unsignedInteger('age');
            $table->string('nationality');
            $table->unsignedInteger('goals_season')->default(0);
            $table->foreignId('team_id')->nullable()->constrained()->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
