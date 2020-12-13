@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Pemasukan</h6>
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
    Pemasukan</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Pemasukan</th>
                <th>Kategori</th>
                <th>Tanggal Pemasukan</th>
                <th>Jumlah Pemasukan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukan as $pemasukan)
            <tr>
                <td>{{ $pemasukan->nama_pemasukan }}</td>
                <td>{{ $pemasukan->kategori }}</td>
                <td>{{ date("d-m-Y", strtotime($pemasukan->tanggal_pemasukan)) }}</td>
                <td>Rp. {{ number_format($pemasukan->jumlah_pemasukan, 0, ',', '.') }}</td>
                <td><a href="/pemasukan/{{ $pemasukan->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $pemasukan->nama_pemasukan }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pemasukan/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('nama_pemasukan') ? ' has-error': '' }}">
                        <label>Nama Pemasukan</label>
                        <input type="text" name="nama_pemasukan" class="form-control form-control-user"
                            value="{{ old('nama_pemasukan') }}" placeholder="Masukan Nama Pemasukan" required>
                        @if($errors->has('nama_pemasukan'))
                        <span class="help-block">{{ $errors->first('nama_pemasukan') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('kategori') ? ' has-error': '' }}">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Kerja" {{ (old('kategori') == 'Kerja') ? 'selected' : '' }}>Kerja</option>
                            <option value="Hadiah" {{ (old('kategori') == 'Hadiah') ? 'selected' : '' }}>Hadiah</option>
                            <option value="Orang Tua" {{ (old('kategori') == 'Orang Tua') ? 'selected' : '' }}>Orang Tua
                            </option>
                            <option value="Saham/Investasi"
                                {{ (old('kategori') == 'Saham/Investasi') ? 'selected' : '' }}>
                                Saham/Investasi</option>
                            <option value="Lain-lain" {{ (old('kategori') == 'Lain-lain') ? 'selected' : '' }}>Lain-Lain
                            </option>
                        </select>
                        @if($errors->has('kategori'))
                        <span class="help-block">{{ $errors->first('kategori') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('tanggal_pemasukan') ? ' has-error': '' }}">
                        <label>Tanggal Pemasukan</label>
                        <input type="date" name="tanggal_pemasukan" class="form-control form-control-user"
                            value="{{ old('tanggal_pemasukan') }}" required>
                        @if($errors->has('tanggal_pemasukan'))
                        <span class="help-block">{{ $errors->first('tanggal_pemasukan') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('jumlah_pemasukan') ? ' has-error': '' }}">
                        <label>Jumlah Pemasukan</label>
                        <input type="number" name="jumlah_pemasukan" class="form-control form-control-user"
                            value="{{ old('jumlah_pemasukan') }}" placeholder="Masukan Jumlah Pemasukan" required>
                        @if($errors->has('jumlah_pemasukan'))
                        <span class="help-block">{{ $errors->first('jumlah_pemasukan') }}</span>
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