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
        Schema::create('kampus', function (Blueprint $table) {
            $table->id();
            $table->string('no_kode')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('id_cluster_kampus')->nullable();

            $table->timestamps();
            $table->foreign('id_cluster_kampus')->references('id')->on('cluster_kampus')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampus');
    }
};
