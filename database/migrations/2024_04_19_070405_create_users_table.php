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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            
            $table->unsignedBigInteger('jalur_prestasi_id')->nullable();
            $table->unsignedBigInteger('sekolah_id')->nullable();
            $table->unsignedBigInteger('pondok_id')->nullable();
            $table->unsignedBigInteger('cluster_id')->nullable();
            $table->timestamps();

            $table->foreign('jalur_prestasi_id')->references('id')->on('jalur_prestasis')->onDelete('set null');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs')->onDelete('set null');
            $table->foreign('pondok_id')->references('id')->on('pondoks')->onDelete('set null');
            $table->foreign('cluster_id')->references('id')->on('cluster_beasiswas')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};