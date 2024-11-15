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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string("film_title");
            $table->string("film_director");
            $table->unsignedBigInteger("genre_id");
            $table->integer("film_year");
            $table->softDeletes();
            $table->timestamps();
            $table->foreign("genre_id")->references("id")->on("genres")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
