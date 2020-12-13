<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\User;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::where('users_id', auth()->user()->id)->get();
        return view('dashboard.pengeluaran.index', ['pengeluaran' => $pengeluaran]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'nama_pengeluaran' => 'required|min:3',
            'kategori' => 'required',
            'tanggal_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required|numeric'
        ]);
        $pengeluaran = new Pengeluaran;
        $pengeluaran->users_id = auth()->user()->id;
        $pengeluaran->nama_pengeluaran = $request->nama_pengeluaran;
        $pengeluaran->kategori = $request->kategori;
        $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->save();

        $user = User::find(auth()->user()->id);
        $total_pengeluaran_baru = $request->jumlah_pengeluaran + $user->total_pengeluaran;
        $saldo_baru = $user->saldo - $request->jumlah_pengeluaran;

        User::where('id', auth()->user()->id)
            ->update([
                'saldo' => $saldo_baru,
                'total_pengeluaran' => $total_pengeluaran_baru
            ]);

        return redirect('/pengeluaran')->with('status', 'Sukses Tambah Pengeluaran');
    }

    public function delete($id)
    {
        $pengeluaran_data = Pengeluaran::find($id);
        $user_data = User::find($pengeluaran_data->users_id);
        $total_pengeluaran_baru = $user_data->total_pengeluaran - $pengeluaran_data->jumlah_pengeluaran;
        $saldo_baru = $user_data->saldo + $pengeluaran_data->jumlah_pengeluaran;
        User::where('id', auth()->user()->id)
            ->update([
                'saldo' => $saldo_baru,
                'total_pengeluaran' => $total_pengeluaran_baru
            ]);
        $pengeluaran_data->delete();

        return redirect('/pengeluaran')->with('status', 'Data Pengeluaran Sukses Dihapus');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $pengeluaran = Pengeluaran::where('users_id', auth()->user()->id)->get();
            return view('dashboard.pengeluaran.filter', ['pengeluaran' => $pengeluaran]);
        } else {
            $pengeluaran = Pengeluaran::whereBetween('tanggal_pengeluaran', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.pengeluaran.filter', ['pengeluaran' => $pengeluaran, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }

    public function print(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $pengeluaran = Pengeluaran::where('users_id', auth()->user()->id)->get();
        } else {
            $pengeluaran = Pengeluaran::whereBetween('tanggal_pengeluaran', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
        }
        return view('dashboard.pengeluaran.report', ['pengeluaran' => $pengeluaran]);
    }
}
