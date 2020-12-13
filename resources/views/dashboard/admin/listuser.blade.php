@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data User</h6>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Saldo</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>Rp. {{ number_format($user->saldo, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($user->total_pemasukan, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($user->total_pengeluaran, 0, ',', '.') }}</td>
                <td><a href="/admin/user/{{ $user->id }}/manage" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-pen fa-sm text-white-50"></i> Manage Role / Deactivate</a>
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