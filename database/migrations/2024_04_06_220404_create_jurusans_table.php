<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');

            $table->unsignedBigInteger('kampus_id')->nullable();
            $table->unsignedBigInteger('fakultas_id')->nullable();
            $table->unsignedBigInteger('cluster_id')->nullable();
            $table->timestamps();

            $table->foreign('kampus_id')->references('id')->on('kampuses')->onDelete('set null');
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('set null');
            $table->foreign('cluster_id')->references('id')->on('cluster_beasiswas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
