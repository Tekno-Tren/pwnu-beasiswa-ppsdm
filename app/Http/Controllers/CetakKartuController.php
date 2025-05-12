<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakKartuController extends Controller
{
    public function cetakKartu($id)
    {
        // $no_peserta = str_pad((string)$id, 4, '0', STR_PAD_LEFT);id_cluster_kampus_1
        $tahun = date('Y'); // atau tulis langsung: 2025
        $no_peserta = substr($tahun, 2, 2) . '-' . $id_cluster_kampus . '-' . $id;
        $no_pendaftaran_kampus = Pendaftaran::find($id)->no_pendaftaran_kampus;
        $nama = Pendaftaran::find($id)->user->name;
        $jenis_kelamin = Pendaftaran::find($id)->user->jenis_kelamin;
        if (Pendaftaran::find($id)->id_jalur_prestasi != null)
            $prestasi = Pendaftaran::find($id)->jalur_prestasi->nama;
        else
            $prestasi = '';
        $kampus_tujuan = Pendaftaran::find($id)->kampus1->nama;
        $prodi_pilihan_1 = Pendaftaran::find($id)->jurusan1->nama;
        if (Pendaftaran::find($id)->id_jurusan_2 != null)
            $prodi_pilihan_2 = Pendaftaran::find($id)->jurusan2->nama;
        else
            $prodi_pilihan_2 = '';
        // dd($no_peserta, $no_pendaftaran_kampus, $nama, $jenis_kelamin, $prestasi, $kampus_tujuan, $prodi_pilihan_1, $prodi_pilihan_2);
        return Pdf::loadView('cetak-kartu', [
            'no_peserta' => $no_peserta,
            'no_pendaftaran_kampus' => $no_pendaftaran_kampus,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'prestasi' => $prestasi,
            'kampus_tujuan' => $kampus_tujuan,
            'prodi_pilihan_1' => $prodi_pilihan_1,
            'prodi_pilihan_2' => $prodi_pilihan_2,
            ])
            ->stream($no_peserta . ' - ' . $nama . '.pdf');
    }
}
