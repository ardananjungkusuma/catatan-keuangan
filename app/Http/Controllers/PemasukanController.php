<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan;
use App\User;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::where('users_id', auth()->user()->id)->get();
        return view('dashboard.pemasukan.index', ['pemasukan' => $pemasukan]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'nama_pemasukan' => 'required|min:3',
            'kategori' => 'required',
            'tanggal_pemasukan' => 'required',
            'jumlah_pemasukan' => 'required|numeric'
        ]);
        $pemasukan = new Pemasukan;
        $pemasukan->users_id = auth()->user()->id;
        $pemasukan->nama_pemasukan = $request->nama_pemasukan;
        $pemasukan->kategori = $request->kategori;
        $pemasukan->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->save();

        $user = User::find(auth()->user()->id);
        $total_pemasukan_baru = $request->jumlah_pemasukan + $user->total_pemasukan;
        $saldo_baru = $request->jumlah_pemasukan + $user->saldo;

        User::where('id', auth()->user()->id)
            ->update([
                'saldo' => $saldo_baru,
                'total_pemasukan' => $total_pemasukan_baru
            ]);

        return redirect('/pemasukan')->with('status', 'Sukses Tambah Pemasukan');
    }
}
