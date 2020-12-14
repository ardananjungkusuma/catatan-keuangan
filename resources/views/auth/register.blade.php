@extends('auth.template')
@section('content')
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form class="user" method="POST" action="/postRegister">
                                    @csrf
                                    <div class="form-group {{ $errors->has('name') ? ' has-error': '' }}">
                                        <input type="text" name="name" class="form-control form-control-user"
                                            value="{{ old('name') }}" placeholder="Enter Your Name...">
                                        @if($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? ' has-error': '' }}">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            value="{{ old('email') }}" placeholder="Enter Email Address...">
                                        @if($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                        @if($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login</a><br>
                                    <a class="small" href="/">Back to Homepage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection