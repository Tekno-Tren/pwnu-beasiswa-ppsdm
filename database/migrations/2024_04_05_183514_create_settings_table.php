<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type')->default('text');
            $table->timestamps();
        });

        Setting::create([
            'key' => 'site_name',
            'label' => 'Judul Situs',
            'value' => 'Laravel Filament',
        ]);

        Setting::create([
            'key' => '_location',
            'label' => 'Alamat kantor',
            'value' => 'Sukolilo, Surabaya, Indonesia',
        ]);

        Setting::create([
            'key' => '_instagram',
            'label' => 'Alamat Ig',
            'value' => 'Hehehuhu, Surabaya, Indonesia',
        ]);

        Setting::create([
            'key' => '_site_description',
            'label' => 'Site Description',
            'value' => 'Website sederhana, dengan admin filament, untuk hidup sederhana',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
