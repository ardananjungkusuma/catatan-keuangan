@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
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
    Pengeluaran</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Pengeluaran</th>
                <th>Kategori</th>
                <th>Tanggal Pengeluaran</th>
                <th>Jumlah Pengeluaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluaran as $pengeluaran)
            <tr>
                <td>{{ $pengeluaran->nama_pengeluaran }}</td>
                <td>{{ $pengeluaran->kategori }}</td>
                <td>{{ date("d-m-Y", strtotime($pengeluaran->tanggal_pengeluaran)) }}</td>
                <td>Rp. {{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</td>
                <td><a href="/pengeluaran/{{ $pengeluaran->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $pengeluaran->nama_pengeluaran }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pengeluaran/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('nama_pengeluaran') ? ' has-error': '' }}">
                        <label>Nama Pengeluaran</label>
                        <input type="text" name="nama_pengeluaran" class="form-control form-control-user"
                            value="{{ old('nama_pengeluaran') }}" placeholder="Masukan Nama pengeluaran" required>
                        @if($errors->has('nama_pengeluaran'))
                        <span class="help-block">{{ $errors->first('nama_pengeluaran') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('kategori') ? ' has-error': '' }}">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Belanja" {{ (old('kategori') == 'Belanja') ? 'selected' : '' }}>Belanja
                            </option>
                            <option value="Makanan & Minuman"
                                {{ (old('kategori') == 'Makanan & Minuman') ? 'selected' : '' }}>
                                Makanan & Minuman</option>
                            <option value="Kebutuhan Pokok"
                                {{ (old('kategori') == 'Kebutuhan Pokok') ? 'selected' : '' }}>Kebutuhan Pokok</option>
                            <option value="Tagihan" {{ (old('kategori') == 'Tagihan') ? 'selected' : '' }}>
                                Tagihan(Wifi, Listrik dll)</option>
                            <option value="Lain-lain" {{ (old('kategori') == 'Lain-lain') ? 'selected' : '' }}>Lain-Lain
                            </option>
                        </select>
                        @if($errors->has('kategori'))
                        <span class="help-block">{{ $errors->first('kategori') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('tanggal_pengeluaran') ? ' has-error': '' }}">
                        <label>Tanggal pengeluaran</label>
                        <input type="date" name="tanggal_pengeluaran" class="form-control form-control-user"
                            value="{{ old('tanggal_pengeluaran') }}" required>
                        @if($errors->has('tanggal_pengeluaran'))
                        <span class="help-block">{{ $errors->first('tanggal_pengeluaran') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('jumlah_pengeluaran') ? ' has-error': '' }}">
                        <label>Jumlah pengeluaran</label>
                        <input type="number" name="jumlah_pengeluaran" class="form-control form-control-user"
                            value="{{ old('jumlah_pengeluaran') }}" placeholder="Masukan Jumlah pengeluaran" required>
                        @if($errors->has('jumlah_pengeluaran'))
                        <span class="help-block">{{ $errors->first('jumlah_pengeluaran') }}</span>
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