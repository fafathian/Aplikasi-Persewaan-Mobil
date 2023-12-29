<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mobil = Mobil::paginate(10);
        return view('home', compact('mobil'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mobil = mobil::where('model', 'like', "%" . $keyword . "%")->orwhere('merek', 'like', "%" . $keyword . "%")->orwhere('status', 'like', "%" . $keyword . "%")->paginate(5);
        return view('home', compact('mobil'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }
}
