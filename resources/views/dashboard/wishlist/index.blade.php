@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Wishlist</h6>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<button type="button" class="btn btn-sm btn-success shadow-sm mb-3" data-toggle="modal" data-target="#addModal"><i
        class="fas fa-plus fa-sm text-white-50"></i>
    Tambah
    Wishlist</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Wishlist</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wishlist as $wishlist)
            <tr>
                <td>{{ $wishlist->nama_wishlist }}</td>
                <td>Rp. {{ number_format($wishlist->harga_wishlist, 0, ',', '.') }}</td>
                <td>{{ date("d-m-Y", strtotime($wishlist->tanggal_wishlist)) }}</td>
                <td>
                    <center>
                        <img width="100" src="{{ $wishlist->getImage() }}" alt="Image Wishlist">
                    </center>
                </td>
                <td>{{ $wishlist->status_wishlist }}</td>
                <td>
                    <a href="/wishlist/{{ $wishlist->id }}/edit" class="btn btn-sm btn-info shadow-sm mb-3">
                        <i class="fas fa-pen fa-sm text-white-50">
                        </i> Edit
                    </a>
                    <a href="/wishlist/{{ $wishlist->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $wishlist->nama_wishlist }})?')"><i
                            class="fas fa-trash fa-sm text-white-50"></i> Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Wishlist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/wishlist/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('nama_wishlist') ? ' has-error': '' }}">
                        <label>Nama Wishlist</label>
                        <input type="text" name="nama_wishlist" class="form-control form-control-user"
                            value="{{ old('nama_wishlist') }}" placeholder="Masukan Nama Wishlist" required>
                        @if($errors->has('nama_wishlist'))
                        <span class="help-block">{{ $errors->first('nama_wishlist') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('harga_wishlist') ? ' has-error': '' }}">
                        <label>Harga Wishlist</label>
                        <input type="number" name="harga_wishlist" class="form-control form-control-user"
                            value="{{ old('harga_wishlist') }}" placeholder="Masukan Harga Wishlist" required>
                        @if($errors->has('harga_wishlist'))
                        <span class="help-block">{{ $errors->first('harga_wishlist') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('tanggal_wishlist') ? ' has-error': '' }}">
                        <label>Tanggal Wishlist</label>
                        <input type="date" name="tanggal_wishlist" class="form-control form-control-user"
                            value="{{ old('tanggal_wishlist') }}" required>
                        @if($errors->has('tanggal_wishlist'))
                        <span class="help-block">{{ $errors->first('tanggal_wishlist') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('image_wishlist') ? ' has-error': '' }}">
                        <label>Gambar Wishlist (Tidak Wajib)</label>
                        <input type="file" name="image_wishlist" class="form-control">
                        @if($errors->has('image_wishlist'))
                        <span class="help-block">{{ $errors->first('image_wishlist') }}</span>
                        @endif
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection