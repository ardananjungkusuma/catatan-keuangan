@extends('dashboard.layout.reportmaster')

@section('title_content')
Wishlist
@endsection

@section('content')
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