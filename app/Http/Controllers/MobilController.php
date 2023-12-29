<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobil = Mobil::paginate(10);
        return view('admin.mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'noplat' => 'required|string',
            'tarif' => 'required|numeric',
        ]);

        mobil::create([
            'id' => $request->id,
            'merek' => $request->merek,
            'model' => $request->model,
            'noplat' => $request->noplat,
            'tarif' => $request->tarif,
        ]);

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mobil = mobil::findorfail($id);
        return view('admin.mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mobil_data = $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'noplat' => 'required|string',
            'tarif' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $mobil = mobil::findorfail($id);

        $mobil_data = [
            'id' => $request->id,
            'merek' => $request->merek,
            'model' => $request->model,
            'noplat' => $request->noplat,
            'tarif' => $request->tarif,
            'status' => $request->status,
        ];

        $mobil->update($mobil_data);

        return redirect('/admin/mobil')->with('success', 'Data Mobil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mobil = mobil::findorfail($id);
        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Data Mobil Anda Berhasil Dihapus');
    }


}
