@extends('dashboard.layout.reportmaster')

@section('title_content')
Hutang
@endsection

@section('content')
<table class="table table-bordered" style="margin-top: 10px">
    <thead class="thead-dark">
        <tr>
            <th>Nama Orang</th>
            <th>Kategori</th>
            <th>Nominal Hutang</th>
            <th>Tanggal Hutang</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hutang as $hutang)
        <tr>
            <td>{{ $hutang->nama_orang }}</td>
            <td>{{ $hutang->kategori }}</td>
            <td>Rp. {{ number_format($hutang->nominal_hutang, 0, ',', '.') }}</td>
            <td>{{ date("d-m-Y", strtotime($hutang->tanggal_hutang)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection