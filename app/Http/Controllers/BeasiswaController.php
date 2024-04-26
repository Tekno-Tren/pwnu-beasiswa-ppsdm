<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kampus;
use App\Models\Jurusan;
use App\Models\Beasiswa;
use Illuminate\Http\Request;
use App\Models\JalurPrestasi;
use App\Models\ClusterBeasiswa;
use Illuminate\Support\Facades\Auth;

class BeasiswaController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $jalurprestasi = JalurPrestasi::all();
        // dd($user);
        return view('beasiswa.daftar2', compact('jalurprestasi'));
    }

    public function index_cluster()
    {
        $user_id = Auth::id();
        $cluster = ClusterBeasiswa::all();
        // dd($user);
        return view('beasiswa.daftar_cluster', compact('user_id', 'cluster'));
    }

    public function index_kampus()
    {
        $user_id = Auth::id();
        $cluster_id = Beasiswa::where('user_id', $user_id)->first()->cluster_id;
        $kampus = Kampus::where('cluster_id', $cluster_id)->get();
        return view('beasiswa.daftar_kampus', compact('user_id', 'kampus'));
    }

    public function index_jurusan()
    {
        $user_id = Auth::id();
        $kampus_id = Beasiswa::where('user_id', $user_id)->first()->kampus_id;
        $jurusan = Jurusan::where('kampus_id', $kampus_id)->get();
        return view('beasiswa.daftar_jurusan', compact('user_id', 'jurusan'));
    }

    // public function create()
    // {
    //     return view('create');
    // }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $user->update([
            'jalur_prestasi_id' => $request->jalur_prestasi
            // 'slug' => Str::slug($request->title)
        ]);

        if($user) {
            return redirect()
                ->route('beasiswa.daftar.cluster')
                ->with([
                    'success' => 'has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }
    }

    public function store_cluster(Request $request)
    {
        $beasiswa = Beasiswa::create([
            'user_id' => $request->user_id,
            'no_registrasi' => $request->no_reg,
            'cluster_id' => $request->cluster
        ]);

        if($beasiswa) {
            return redirect()
                ->route('beasiswa.daftar.kampus')
                ->with([
                    'success' => 'has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }
    }
    public function store_kampus(Request $request)
    {
        $beasiswa = Beasiswa::where('user_id', $request->user_id)->first();
        $beasiswa->update([
            'kampus_id' => $request->kampus
        ]);

        if($beasiswa) {
            return redirect()
                ->route('beasiswa.daftar.jurusan')
                ->with([
                    'success' => 'has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }
    }
    public function store_jurusan(Request $request)
    {
        $beasiswa = Beasiswa::where('user_id', $request->user_id)->first();
        $beasiswa->update([
            'jurusan_id' => $request->jurusan
        ]);

        if($beasiswa) {
            return redirect()
                ->route('landing')
                ->with([
                    'success' => 'has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occured, Please try again'
                ]);
        }
    }
    // public function edit($id)
    // {
    //     $post = Post::findOrFail($id);
    //     return view('edit', compact('post'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'title' => 'required|string|max:155',
    //         'content' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $post = Post::findOrFail($id);

    //     $post->update([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'status' => $request->status,
    //         'slug' => Str::slug($request->title)
    //     ]);

    //     if($post) {
    //         return redirect()
    //             ->route('post.index')
    //             ->with([
    //                 'success' => 'Post has been updated successfully'
    //             ]);
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem occured, Please try again'
    //             ]);
    //     }        
    // }

    // public function destroy($id)
    // {
    //     $post = Post::findOrFail($id);
    //     $post->delete();

    //     if($post) {
    //         return redirect()
    //             ->route('post.index')
    //             ->with([
    //                 'success' => 'Post has been deleted successfully'
    //             ]);
    //     } else {
    //         return redirect()
    //             ->route('post.index')
    //             ->back()
    //             ->with([
    //                 'error' => 'Some problem occured, Please try again'
    //             ]);
    //     }
    // }
}
