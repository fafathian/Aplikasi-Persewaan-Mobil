<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class RentalController extends Controller
{
    public function rentCar($mobil_id)
    {
        // Proses penyewaan mobil
        // ...

        // Setelah penyewaan berhasil, tambahkan data penyewaan ke tabel
        $mobil = mobil::find($mobil_id); // Ganti dengan id mobil yang disewa
        $user = Auth::user();

        // Hitung jumlah hari sewa
        $start_date = \Carbon\Carbon::parse($startDate);
        $end_date = \Carbon\Carbon::parse($endDate);
        $rentalDays = $end_date->diffInDays($start_date) + 1;

        // Hitung biaya sewa berdasarkan tarif harian
        $rentalRate = $mobil->tarif; // Ganti dengan atribut tarif harian mobil
        $totalCost = $rentalDays * $rentalRate;

        // Simpan data penyewaan beserta biaya sewa
        Rental::create([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'user_id' => $user->id,
            'mobil_id' => $mobil->id,
            'total_cost' => $totalCost,
            'status' => 'disewa',
        ]);

        // ...

        return redirect('/home')->with('success', 'Data Mobil berhasil diperbarui!');

        // Redirect atau kirim respons sesuai kebutuhan
    }

    public function calculateTotalCost(Rental $rental)
    {
        // Contoh metode untuk menghitung total biaya sewa
        // Anda dapat menyesuaikannya sesuai kebutuhan aplikasi Anda
        // Misalnya, mempertimbangkan biaya tambahan, diskon, dll.

        $totalCost = $rental->total_cost;

        return view('total_cost', compact('totalCost'));
    }
    public function create()
    {
        // Retrieve a list of available cars for rent
        $availableCars = mobil::where('status', "tersedia", true)->get();
        // dd($availableCars);
        return view('sewa_mobil', compact('availableCars'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'mobil_id' => 'required|exists:mobils,id',
        ]);

        // Retrieve the selected car
        $mobil = mobil::find($request->mobil_id);

        // Calculate rental duration and cost
        $start_date = \Carbon\Carbon::parse($request->start_date);
        $end_date = \Carbon\Carbon::parse($request->end_date);
        $rentalDays = $end_date->diffInDays($start_date) + 1;
        $rentalRate = $mobil->tarif;
        $totalCost = $rentalDays * $rentalRate;

        // Create a new rental record
        Rental::create([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'user_id' => Auth::id(),
            'mobil_id' => $mobil->id,
            'total_cost' => $totalCost,
        ]);

        // You can customize the success message and redirect as needed
        return redirect()->route('home')->with('success', 'Car rented successfully!');
    }

    public function userRentals()
    {
        // Ambil semua penyewaan yang dimiliki oleh pengguna yang sedang masuk
        $userRentals = Auth::user()->rentals()->with('mobil')->get();

        return view('aktifitas', compact('userRentals'));
    }

    public function returnForm($mobilId)
    {
        $rental = Rental::where('mobil_id', $mobilId)->whereNull('returned_at')->firstOrFail();
        return view('pengembalian', compact('rental'));
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
            'status' => 'dikembalikan',
        ]);

        return redirect()->route('user.rentals')->with('success', 'Car returned successfully.');
    }
}
