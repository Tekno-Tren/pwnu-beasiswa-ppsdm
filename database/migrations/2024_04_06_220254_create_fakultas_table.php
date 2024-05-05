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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');

            $table->unsignedBigInteger('id_kampus')->nullable();
            $table->timestamps();

            $table->foreign('id_kampus')->references('id')->on('kampus')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};
