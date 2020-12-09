<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengeluaran;
use App\Pemasukan;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data_user = User::find(auth()->user()->id);
        $data_pengeluaran = Pengeluaran::where('users_id', auth()->user()->id)->groupBy('kategori')
            ->selectRaw('sum(jumlah_pengeluaran) as sum, kategori')
            ->pluck('sum', 'kategori')->toArray();

        $kategori_pengeluaran = array_keys($data_pengeluaran);
        $data_pengeluaran_by_kategori = array_map('intval', array_values($data_pengeluaran));

        $data_pengeluaran = Pengeluaran::where('users_id', auth()->user()->id)->groupBy('kategori')
            ->selectRaw('sum(jumlah_pengeluaran) as sum, kategori')
            ->pluck('sum', 'kategori')->toArray();




        return view('dashboard.user.dashboard', ['user' => $data_user, 'kategori_pengeluaran' => $kategori_pengeluaran, 'data_pengeluaran_by_kategori' => $data_pengeluaran_by_kategori]);
    }
}
