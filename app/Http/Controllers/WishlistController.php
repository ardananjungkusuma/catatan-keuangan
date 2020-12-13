<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('users_id', auth()->user()->id)->get();

        return view('dashboard.wishlist.index', ['wishlist' => $wishlist]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'nama_wishlist' => 'required|min:3',
            'harga_wishlist' => 'required|numeric',
            'tanggal_wishlist' => 'required',
            'image_wishlist' => 'mimes:jpg,png,jpeg|max:3100'
        ]);

        $pathUpload = 'img/wishlist';
        $data_wishlist = new Wishlist;
        $data_wishlist->users_id = auth()->user()->id;
        $data_wishlist->nama_wishlist = $request->nama_wishlist;
        $data_wishlist->harga_wishlist = $request->harga_wishlist;
        $data_wishlist->tanggal_wishlist = $request->tanggal_wishlist;

        if ($request->hasFile('image_wishlist')) {
            $image = str_replace(" ", "", $request->file('image_wishlist')->getClientOriginalName());

            $nama_file = date('dmYHis') . "_" . $image;

            $request->file('image_wishlist')->move($pathUpload, $nama_file);
            // dd($nama_file);
            $data_wishlist->image_wishlist = $nama_file;
            $data_wishlist->save();
        } else {
            $data_wishlist->image_wishlist = "noimage.jpg";
            $data_wishlist->save();
        }

        return redirect('/wishlist')->with('status', 'Sukses Tambah Wishlist');
    }

    public function edit($id)
    {
        $wishlist = Wishlist::find($id);
        // dd($wishlist);
        return view('dashboard.wishlist.edit', ['wishlist' => $wishlist]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'nama_wishlist' => 'required|min:3',
            'harga_wishlist' => 'required|numeric',
            'tanggal_wishlist' => 'required',
            'status_wishlist' => 'required',
            'image_wishlist' => 'mimes:jpg,png,jpeg|max:3100'
        ]);

        $pathUpload = 'img/wishlist/';
        $data_wishlist = Wishlist::find($id);
        // dd($data_wishlist);
        $data_wishlist->nama_wishlist = $request->nama_wishlist;
        $data_wishlist->harga_wishlist = $request->harga_wishlist;
        $data_wishlist->tanggal_wishlist = $request->tanggal_wishlist;
        $data_wishlist->status_wishlist = $request->status_wishlist;

        $currentImage = $data_wishlist->image_wishlist;

        if ($request->hasFile('image_wishlist')) {
            if ($currentImage != "noimage.jpg") {
                unlink($pathUpload . $data_wishlist->image_wishlist);
            }

            $image = str_replace(" ", "", $request->file('image_wishlist')->getClientOriginalName());

            $nama_file = date('dmYHis') . "_" . $image;

            $request->file('image_wishlist')->move($pathUpload, $nama_file);
            // dd($nama_file);
            $data_wishlist->image_wishlist = $nama_file;
            $data_wishlist->save();
        } else {
            $data_wishlist->save();
        }

        return redirect('/wishlist')->with('status', 'Sukses Edit Wishlist');
    }

    public function delete($id)
    {
        $pathUpload = 'img/wishlist/';
        $data_wishlist = Wishlist::find($id);
        if ($data_wishlist->image_wishlist != "noimage.jpg") {
            unlink($pathUpload . $data_wishlist->image_wishlist);
        }

        $data_wishlist->delete();
        return redirect('/wishlist')->with('status', 'Sukses Hapus Wishlist');
    }

    public function filter(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $wishlist = Wishlist::where('users_id', auth()->user()->id)->get();
            return view('dashboard.wishlist.filter', ['wishlist' => $wishlist]);
        } else {
            $wishlist = Wishlist::whereBetween('tanggal_wishlist', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
            return view('dashboard.wishlist.filter', ['wishlist' => $wishlist, 'startdate' => $request->startdate, 'enddate' => $request->enddate]);
        }
    }

    public function print(Request $request)
    {
        if (!$request->startdate && !$request->enddate) {
            $wishlist = Wishlist::where('users_id', auth()->user()->id)->get();
        } else {
            $wishlist = Wishlist::whereBetween('tanggal_wishlist', [$request->startdate, $request->enddate])
                ->where('users_id', auth()->user()->id)
                ->get();
        }
        return view('dashboard.wishlist.report', ['wishlist' => $wishlist]);
    }
}
