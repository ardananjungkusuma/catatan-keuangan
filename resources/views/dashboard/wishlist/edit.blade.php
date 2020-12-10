@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Edit Wishlist</h6>
@endsection

@section('content')
<form action="/wishlist/{{ $wishlist->id }}/postEdit" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group {{ $errors->has('nama_wishlist') ? ' has-error': '' }}">
        <label>Nama Wishlist</label>
        <input type="text" name="nama_wishlist" class="form-control form-control-user"
            value="{{ $wishlist->nama_wishlist }}" placeholder="Masukan Nama Wishlist" required>
        @if($errors->has('nama_wishlist'))
        <span class="help-block">{{ $errors->first('nama_wishlist') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('harga_wishlist') ? ' has-error': '' }}">
        <label>Harga Wishlist</label>
        <input type="number" name="harga_wishlist" class="form-control form-control-user"
            value="{{ $wishlist->harga_wishlist }}" placeholder="Masukan Harga Wishlist" required>
        @if($errors->has('harga_wishlist'))
        <span class="help-block">{{ $errors->first('harga_wishlist') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('tanggal_wishlist') ? ' has-error': '' }}">
        <label>Tanggal Wishlist</label>
        <input type="date" name="tanggal_wishlist" class="form-control form-control-user"
            value="{{ $wishlist->tanggal_wishlist }}" required>
        @if($errors->has('tanggal_wishlist'))
        <span class="help-block">{{ $errors->first('tanggal_wishlist') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('status_wishlist') ? ' has-error': '' }}">
        <label>status_wishlist</label>
        <select class="form-control" name="status_wishlist" required>
            <option value="Belum Tercapai" {{ $wishlist->status_wishlist == 'Belum Tercapai' ? 'selected' : '' }}>Belum
                Tercapai
            </option>
            <option value="Sudah Tercapai" {{ $wishlist->status_wishlist == 'Sudah Tercapai' ? 'selected' : '' }}>
                Sudah Tercapai</option>
        </select>
        @if($errors->has('status_wishlist'))
        <span class="help-block">{{ $errors->first('status_wishlist') }}</span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('image_wishlist') ? ' has-error': '' }}">
        <label>Gambar Wishlist (Jika ingin ganti silahkan pilih gambar baru)</label><br>
        <img src="{{ $wishlist->getImage() }}" width="100" alt="Gambar Wishlist">
        <input type="file" name="image_wishlist" class="form-control" value="{{ $wishlist->gambar_wishlist }}">
        @if($errors->has('image_wishlist'))
        <span class="help-block">{{ $errors->first('image_wishlist') }}</span>
        @endif
    </div>
    <a href="/wishlist" class="btn btn-primary">Back</a>
    <button class="btn btn-info" type="submit">Edit Data</button>
</form>
@endsection