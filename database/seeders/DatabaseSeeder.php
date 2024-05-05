<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin PPSDM',
            'email' => 'admin@example.com',
        ]);

        DB::table('sekolahs')->insert([
            [
                'npsn' => '12345678',
                'nama' => 'SMA Negeri 1 Surabaya',
                'alamat' => 'Jl. Surabaya No. 1',
                'no_hp' => '08123456789'
            ],
            [
                'npsn' => '12345679',
                'nama' => 'SMA Negeri 1 Gresik',
                'alamat' => 'Jl. Gresik No. 1',
                'no_hp' => '08123456789'
            ],
            [
                'npsn' => '12345680',
                'nama' => 'SMA Negeri 1 Sidoarjo',
                'alamat' => 'Jl. Sidoarjo No. 1',
                'no_hp' => '08123456789'
            ],
            [
                'npsn' => '12345681',
                'nama' => 'SMA Negeri 1 Malang',
                'alamat' => 'Jl. Malang No. 1',
                'no_hp' => '08123456789'
            ],
            [
                'npsn' => '12345682',
                'nama' => 'MA Negeri 1 Surabaya',
                'alamat' => 'Jl. Surabaya Sebelah No. 1',
                'no_hp' => '08123456789'
            ],
            [
                'npsn' => '12345683',
                'nama' => 'MA Negeri 1 Gresik',
                'alamat' => 'Jl. Gresik Sebelah No. 1',
                'no_hp' => '08123456789'
            ]
        ]);

        DB::table('pondoks')->insert([
            [
                'nspp' => '510035010016',
                'nama' => 'Pondok Pesantren Nurul Iman',
                'alamat' => 'RT. 01 RW. 10 Dusun Pangkah',
                'no_hp' => '08123456789'
            ],
            [
                'nspp' => '512335010039',
                'nama' => 'Pondok Pesantren An-Nur',
                'alamat' => 'RT. 01 RW. 03 Dusun Mudal',
                'no_hp' => '08123456789'
            ],
            [
                'nspp' => '510035010027',
                'nama' => 'Pondok Pesantren Al-Mubarok',
                'alamat' => 'Dsn. Sundeng Kel. Sidoharjo',
                'no_hp' => '08123456789'
            ],
            [
                'nspp' => '510035010010',
                'nama' => 'Pondok Pesantren Al-Anwar',
                'alamat' => 'RT. 03 RW. 06 Dusun Peden',
                'no_hp' => '08123456789'
            ],
            [
                'nspp' => '510035010041',
                'nama' => 'Pondok Pesantren Bustanu `Usysyaqil Qur`an (BUQ) Karangrejo',
                'alamat' => 'Dusun Trobakal RT.002 RW.005',
                'no_hp' => '08123456789'
            ]
        ]);
    }
}
