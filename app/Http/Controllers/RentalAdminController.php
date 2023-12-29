<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rental = Rental::orderBy('created_at', 'DESC')->get();
        return view('admin.rental.index', compact('rental'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rental = Rental::findorfail($id);

        // $order = pesanan_item::findorfail($id);
        // $user = pesanan::findorfail($order->pesanan_id);
        return view('admin.rental.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rental = Rental::findorfail($id);

        $rental_data = [
            'status' => 'disewa',
        ];

        $rental->update($rental_data);

        return redirect()->route('RentalAdmin.index')->with('success', 'Rental Berhasil Dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }

    public function returnForm($mobilId)
    {
        $rental = Rental::where('mobil_id', $mobilId)->whereNull('returned_at')->firstOrFail();
        return view('admin.rental.pengembalianAdmin', compact('rental'));
    }

    public function returnCar(Request $request, $mobilId)
    {
        $request->validate([
            'return_date' => 'required|date',
            // Tambahkan validasi atau informasi lain yang diperlukan
        ]);

        $rental = Rental::where('mobil_id', $mobilId)->whereNull('returned_at')->firstOrFail();

        $returnDate = Carbon::parse($request->input('return_date'));

        // Hitung durasi sewa dalam hari
        $rentalStartDate = Carbon::parse($rental->start_date);
        $rentalDuration = $returnDate->diffInDays($rentalStartDate);

        // Hitung total biaya berdasarkan tarif harian
        $dailyRate = $rental->mobil->tarif;
        $totalCost = $dailyRate * $rentalDuration;

        // Set status "returned" pada penyewaan
        $rental->update([
            'returned_at' => $request->input('return_date'),
            'total_cost' => $totalCost,
            'jumlah_hari' => $rentalDuration,
            'status' => 'dikembalikan',
        ]);

        return redirect()->route('RentalAdmin.index')->with('success', 'Car returned successfully.');
    }
}
