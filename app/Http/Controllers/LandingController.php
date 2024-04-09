<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user == null){
            $userAdmin = false;
        } else {
            if ($user->email == 'admin@example.com'){
                $userAdmin = true;
            } else {
                $userAdmin = false;
            }
        }
        return view('landing', compact('userAdmin'));
    }
}
