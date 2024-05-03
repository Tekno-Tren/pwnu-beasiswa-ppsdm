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
            $table->string('alamat');
            $table->string('no_hp');
            $table->unsignedBigInteger('cluster_id')->nullable();

            $table->timestamps();
            $table->foreign('cluster_id')->references('id')->on('cluster_beasiswa')->onDelete('set null');

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
