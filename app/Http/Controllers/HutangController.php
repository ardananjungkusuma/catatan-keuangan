<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hutang;

class HutangController extends Controller
{
    public function index()
    {
        $hutang = Hutang::where('users_id', auth()->user()->id)->get();
        return view('dashboard.hutang.index', ['hutang' => $hutang]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'nama_orang' => 'required|min:3',
            'kategori' => 'required',
            'nominal_hutang' => 'required|numeric',
            'tanggal_hutang' => 'required'
        ]);
        $hutang = new Hutang;
        $hutang->users_id = auth()->user()->id;
        $hutang->nama_orang = $request->nama_orang;
        $hutang->kategori = $request->kategori;
        $hutang->nominal_hutang = $request->nominal_hutang;
        $hutang->tanggal_hutang = $request->tanggal_hutang;
        $hutang->save();

        return redirect('/hutang')->with('status', 'Sukses Tambah Hutang');
    }

    public function delete($id)
    {
        Hutang::find($id)->delete();

        return redirect('/hutang')->with('status', 'Data Hutang Sukses Dihapus');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $hutang = Hutang::where('users_id', auth()->user()->id)->get();
            return view('dashboard.hutang.filter', ['hutang' => $hutang]);
        } else {
            $hutang = Hutang::whereBetween('tanggal_hutang', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.hutang.filter', ['hutang' => $hutang, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }

    public function print(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $hutang = Hutang::where('users_id', auth()->user()->id)->get();
        } else {
            $hutang = Hutang::whereBetween('tanggal_hutang', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
        }
        return view('dashboard.hutang.report', ['hutang' => $hutang]);
    }
}
