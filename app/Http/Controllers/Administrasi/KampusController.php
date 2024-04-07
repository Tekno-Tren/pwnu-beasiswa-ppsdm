<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kampus;

class KampusController extends Controller
{
    public function index()
    {
        return view('admin.administrasi.kampus.index');
    }

    public function create()
    {
        return view('admin.administrasi.kampus.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('admin.administrasi.kampus.show');
    }

    public function edit($id)
    {
        return view('admin.administrasi.kampus.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
