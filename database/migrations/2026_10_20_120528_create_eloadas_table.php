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
        Schema::create('eloadas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('mozi_id');

            $table->date('datum');
            $table->integer('nezoszam');
            $table->integer('bevetel');
            
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('mozi_id')->references('id')->on('mozis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eloadas');
    }
};