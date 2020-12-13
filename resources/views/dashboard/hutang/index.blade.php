@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Hutang</h6>
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
    Hutang</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Orang</th>
                <th>Kategori</th>
                <th>Nominal Hutang</th>
                <th>Tanggal Hutang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hutang as $hutang)
            <tr>
                <td>{{ $hutang->nama_orang }}</td>
                <td>{{ $hutang->kategori }}</td>
                <td>Rp. {{ number_format($hutang->nominal_hutang, 0, ',', '.') }}</td>
                <td>{{ date("d-m-Y", strtotime($hutang->tanggal_hutang)) }}</td>
                <td><a href="/hutang/{{ $hutang->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data hutang {{ $hutang->nama_penghutang }}?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Hutang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/hutang/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('nama_orang') ? ' has-error': '' }}">
                        <label>Nama Orang</label>
                        <input type="text" name="nama_orang" class="form-control form-control-user"
                            value="{{ old('nama_orang') }}" placeholder="Masukan Nama Orang" required>
                        @if($errors->has('nama_orang'))
                        <span class="help-block">{{ $errors->first('nama_orang') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('kategori') ? ' has-error': '' }}">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Meminjamkan Uang"
                                {{ (old('kategori') == 'Meminjamkan Uang') ? 'selected' : '' }}> Meminjamkan Uang
                            </option>
                            <option value="Meminjam Uang" {{ (old('kategori') == 'Meminjam Uang') ? 'selected' : '' }}>
                                Meminjam Uang</option>
                        </select>
                        @if($errors->has('kategori'))
                        <span class="help-block">{{ $errors->first('kategori') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nominal_hutang') ? ' has-error': '' }}">
                        <label>Nominal Hutang</label>
                        <input type="number" name="nominal_hutang" class="form-control form-control-user"
                            value="{{ old('nominal_hutang') }}" placeholder="Masukan Jumlah Nominal Hutang" required>
                        @if($errors->has('nominal_hutang'))
                        <span class="help-block">{{ $errors->first('nominal_hutang') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('tanggal_hutang') ? ' has-error': '' }}">
                        <label>Tanggal Hutang</label>
                        <input type="date" name="tanggal_hutang" class="form-control form-control-user"
                            value="{{ old('tanggal_hutang') }}" required>
                        @if($errors->has('tanggal_hutang'))
                        <span class="help-block">{{ $errors->first('tanggal_hutang') }}</span>
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