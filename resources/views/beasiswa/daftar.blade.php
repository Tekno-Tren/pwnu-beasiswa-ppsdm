@extends('layouts.base')
@section('title', 'Daftar Beasiswa')

@section('content')
    <div class="my-5">
        <form name="formbukutambah" id="formbukutambah" action="/tambah" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="kode" class="col-sm-4 col-form-label">Kode Buku</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode Buku">
                </div>
            </div>

            <p>
            <div class="form-group row">
                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Buku">
                </div>
            </div>

            <p>
            <div class="form-group row">
                <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Nama Pengarang">
                </div>
            </div>

            <p>
            <div class="form-group row">
                <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukan Nama Penerbit">
                </div>
            </div>

            <p>
            <div class="modal-footer">
                <a href="/tutup" class="btn btn-primary">Tutup</a>
                <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
@endsection
