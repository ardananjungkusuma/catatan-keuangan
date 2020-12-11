@extends('dashboard.layout.reportmaster')

@section('title_content')
Pemasukan
@endsection

@section('content')
<table class="table table-bordered" style="margin-top: 10px">
    <thead class="thead-dark">
        <tr>
            <th>Nama Pemasukan</th>
            <th>Kategori</th>
            <th>Tanggal Pemasukan</th>
            <th>Jumlah Pemasukan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemasukan as $pemasukan)
        <tr>
            <td>{{ $pemasukan->nama_pemasukan }}</td>
            <td>{{ $pemasukan->kategori }}</td>
            <td>{{ date("d-m-Y", strtotime($pemasukan->tanggal_pemasukan)) }}</td>
            <td>Rp. {{ number_format($pemasukan->jumlah_pemasukan, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection