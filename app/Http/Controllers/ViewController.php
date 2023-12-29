<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $mobil = Mobil::paginate(10);
        return view('admin.mobil.index', compact('mobil'));
    }

    public function sewa_Mobil()
    {
        return view('sewa_mobil');
    }
}