@extends('dashboard.layout.reportmaster')

@section('title_content')
Pengeluaran
@endsection

@section('content')
<table class="table table-bordered" style="margin-top: 10px">
    <thead class="thead-dark">
        <tr>
            <th>Nama Pengeluaran</th>
            <th>Kategori</th>
            <th>Tanggal Pengeluaran</th>
            <th>Jumlah Pengeluaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengeluaran as $pengeluaran)
        <tr>
            <td>{{ $pengeluaran->nama_pengeluaran }}</td>
            <td>{{ $pengeluaran->kategori }}</td>
            <td>{{ date("d-m-Y", strtotime($pengeluaran->tanggal_pengeluaran)) }}</td>
            <td>Rp. {{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection