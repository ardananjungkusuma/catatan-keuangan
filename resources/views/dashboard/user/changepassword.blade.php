@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
@endsection

@section('content')
<form action="/user/postchangepassword" method="POST">
    @csrf
    <div class="form-group {{ $errors->has('nama_user') ? ' has-error': '' }}">
        <label>Nama</label>
        <input type="text" disabled class="form-control form-control-user" value="{{ $user->name }}" required disabled>
    </div>
    <div class="form-group {{ $errors->has('password') ? ' has-error': '' }}">
        <label>Masukan Password Baru</label>
        <input type="password" name="password" class="form-control form-control-user" required>
        @if($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <a href="/dashboard" class="btn btn-primary">Back</a>
    <button class="btn btn-info" type="submit">Change Password</button>
</form>
@endsection