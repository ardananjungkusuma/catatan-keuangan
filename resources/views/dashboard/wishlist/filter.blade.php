@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Filter Data Wishlist</h6>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<form action="/wishlist/filter" method="POST" style="display:inline">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label class=" form-control-label">Tanggal Awal</label>
            <div class="input-group">
                <input id="startdate" type="date" name="startdate" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <label class=" form-control-label">Tanggal Akhir</label>
            <div class="input-group">
                <input id="enddate" type="date" name="enddate" class="form-control" required>
            </div>
        </div>
    </div><br>
    <button type="submit" class="btn btn-success">Filter Data</button>
</form>
@if (!$wishlist->isEmpty())
@if (!empty($startdate) && !empty($enddate))
<form action="/wishlist/print" method="POST" target="_blank" style="display:inline">
    @csrf
    <input type="hidden" value="{{ $startdate }}" name="startdate">
    <input type="hidden" value="{{ $enddate }}" name="enddate">
    <button type="submit" class="btn btn-warning">Cetak Filter Data</button>
</form>
@else
<a href="/wishlist/print" target="_blank" class="btn btn-warning">Cetak Semua Data</a>
@endif
@else
<center>
    <h5>Maaf anda tidak mempunyai data apapun untuk dicetak</h5>
</center>
@endif
<br><br>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Wishlist</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Gambar</th>
            <th>Status</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection