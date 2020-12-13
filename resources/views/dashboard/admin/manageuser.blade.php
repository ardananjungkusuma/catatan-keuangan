@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Manage User</h6>
@endsection

@section('content')
<form action="/admin/user/{{ $user->id }}/postManage" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" name="name" class="form-control form-control-user" value="{{ $user->name }}" disabled>
    </div>
    <div class="form-group {{ $errors->has('role') ? ' has-error': '' }}">
        <label>Role User</label>
        <select class="form-control" name="role" required>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="deactivate" {{ $user->role == 'deactivate' ? 'selected' : '' }}>Deactivate</option>
        </select>
        @if($errors->has('role'))
        <span class="help-block">{{ $errors->first('role') }}</span>
        @endif
    </div>
    <a href="/admin/listuser" class="btn btn-primary">Back</a>
    <button class="btn btn-info" type="submit">Edit Data</button>
</form>
@endsection