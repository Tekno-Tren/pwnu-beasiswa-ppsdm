@extends('layouts.base')
@section('title', 'Daftar Beasiswa')

@section('content')
<div class="container px-5 my-5">
    <div class="title-form py-4">
        <h2>Formulir Pendaftaran Program Beasiswa Prestasi Keagamaan PWNU Jawa Timur</h2>
        <p class="description text-justify">
            Sehubungan dengan pelaksanaan program Beasiswa Prestasi Keagamaan PWNU Jawa Timur bekerjasama dengan Perguruan Tinggi Negeri dan Perguruan Tinggi Nahdlatul Ulama di Jawa Timur, maka para peserta seleksi program dimohon untuk mendaftar dengan mengisi data dan persyaratan berikut ini        </p>
    </div>
    <form id="contactForm .needs-validation" action="">
        <div class="form-floating mb-3">
            <input class="form-control" id="namaLengkap" type="text" placeholder="Nama Lengkap" required />
            <label for="namaLengkap">Nama Lengkap</label>
            <div class="invalid-feedback">
                Nama lengkap belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="alamatRumah" type="text" placeholder="Alamat Rumah" required />
            <label for="alamatRumah">Alamat Rumah</label>
            <div class="invalid-feedback">
                Alamat rumah belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="namaSekolahMadrasah" type="text" placeholder="Nama Sekolah/Madrasah" required />
            <label for="namaSekolahMadrasah">Nama Sekolah/Madrasah</label>
            <div class="invalid-feedback">
                Nama sekolah/madrasah belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="alamatSekolahMadrasah" type="text" placeholder="Alamat Sekolah/Madrasah" required />
            <label for="alamatSekolahMadrasah">Alamat Sekolah/Madrasah</label>
            <div class="invalid-feedback">
                Alamat sekolah/madrasah belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="namaPondokPesantren" type="text" placeholder="Nama Pondok Pesantren" required />
            <label for="namaPondokPesantren">Nama Pondok Pesantren</label>
            <div class="invalid-feedback">
                Nama pondok pesantren belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="alamatPondokPesantren" type="text" placeholder="Alamat Pondok Pesantren" required />
            <label for="alamatPondokPesantren">Alamat Pondok Pesantren</label>
            <div class="invalid-feedback">
                Alamat pondok pesantren belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="noHandphone" type="text" placeholder="No Handphone" required />
            <label for="noHandphone">No Handphone</label>
            <div class="invalid-feedback">
                No handphone belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="alamatEmail" type="text" placeholder="Alamat Email" required />
            <label for="alamatEmail">Alamat Email</label>
            <div class="invalid-feedback">
                Alamat email belum diisi!
            </div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="universitasTujuanKlusterPtnJalurPrestasiKeagamaan" aria-label="Default select example">
                <option selected>Pilih Universitas</option>
                <option value="1">Universutas Negeri Surabaya (Unesa)</option>
                <option value="2">Universitas Trunojoyo Madura (UTM)</option>
                <option value="3">Universitas Pembangunan Nasional Veteran (UPN)</option>
            <select>
            <label for="universitasTujuanKlusterPtnJalurPrestasiKeagamaan">Universitas Tujuan Kluster PTN (Jalur Prestasi Keagamaan)</label>
            <div class="invalid-feedback">
                Universitas tujuan kluster PTN (jalur prestasi keagamaan) belum dipilih!
            </div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="universitasTujuanKlusterPtnJalurMandiri" aria-label="Default select example" required>
                <option selected>Pilih Universitas</option>
                <option value="1">Institut Teknologi Sepuluh Nopember (ITS)</option>
                <option value="2">Universitas Airlangga (UNAIR)</option>
                <option value="3">Universitas Negeri Malang(UM)</option>
                <option value="3">Universitas Brawijaya(UB)</option>
            <select>
            <label for="universitasTujuanKlusterPtnJalurMandiri">Universitas Tujuan Kluster PTN (Jalur Mandiri)</label>
            <div class="invalid-feedback">
                Universitas tujuan kluster PTN (jalur mandiri) belum dipilih!
            </div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="universitasTujuanKlusterPtnJalurMandiri" aria-label="Default select example" required>
                <option selected>Pilih Universitas</option>
                <option value="1">Universitas Islam Malang (UNISMA)</option>
                <option value="2">Universitas Nahdlatul Ulama Sidoarjo (UNUSIDA)</option>
                <option value="3">Universitas KH A Wahab Hasbullah Jombang (UNWAHA)</option>
                <option value="3">ITS NU Pasuruan</option>
                <option value="3">STAI Salahuddin Pasuruan</option>
                <option value="3">STAI Ar Rosyid Surabaya</option>
                <option value="3">STAI Ma'arif Magetan</option>
                <option value="3">Universitas Nahdlatul Ulama Surabaya (UNUSA)</option>
            <select>
            <label for="universitasTujuanKlusterPtnu">Universitas Tujuan Kluster PTNU</label>
            <div class="invalid-feedback">
                Universitas tujuan kluster PTNU belum dipilih!
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jalur Prestasi</label>
            <div class="form-check">
                <input class="form-check-input" id="tahfidzulQuran" type="radio" name="jalurPrestasi" required />
                <label class="form-check-label" for="tahfidzulQuran">Tahfidzul Qur&#x27;an</label>
                <div class="invalid-feedback">
                    Jalur prestasi belum dipilih!
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="musabaqohTilawatihQuranMtq" type="radio" name="jalurPrestasi" required />
                <label class="form-check-label" for="musabaqohTilawatihQuranMtq">Musabaqoh Tilawatih Qur&#x27;an (MTQ)</label>
                <div class="invalid-feedback">
                    Jalur prestasi belum dipilih!
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="kitabKuning" type="radio" name="jalurPrestasi" required />
                <label class="form-check-label" for="kitabKuning">Kitab Kuning</label>
                <div class="invalid-feedback">
                    Jalur prestasi belum dipilih!
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="jalurKemitraan" type="radio" name="jalurPrestasi" required />
                <label class="form-check-label" for="jalurKemitraan">Jalur Kemitraan</label>
                <div class="invalid-feedback">
                    Jalur prestasi belum dipilih!
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="lampiranRekomPcnuLembagaBanomPwnuPondokPesantrenSekolahNuJatim">Lampiran Rekom (PCNU/Lembaga-Banom PWNU/Pondok Pesantren/Sekolah NU) Jatim</label>
            <input class="form-control" id="lampiranRekomPcnuLembagaBanomPwnuPondokPesantrenSekolahNuJatim" type="file" placeholder="Lampiran Rekom (PCNU/Lembaga-Banom PWNU/Pondok Pesantren/Sekolah NU) Jatim)" required />
            <div class="invalid-feedback">
                Lampiran rekom (PCNU/Lembaga-Banom PWNU/Pondok Pesantren/Sekolah NU) Jatim belum diunggah!
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="lampiranSertifikatPrestasiKeagamaan">Lampiran Sertifikat Prestasi Keagamaan</label>
            <input class="form-control" id="lampiranSertifikatPrestasiKeagamaan" type="file" placeholder="Lampiran Sertifikat Prestasi Keagamaan" required />
            <div class="invalid-feedback">
                Lampiran sertifikat prestasi keagamaan belum diunggah!
            </div>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-lg " id="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('custom-script')
<script>
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection
