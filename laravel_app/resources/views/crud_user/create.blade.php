@extends('dashboard')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Màn hình đăng ký</h3>
                    <div class="card-body">
                        <form action="{{ route('user.postUser') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Mật khẩu</label>
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Nhập lại mật khẩu</label>
                                <input type="password" placeholder="Password" id="password_confirmation" class="form-control" name="password_confirmation" required>
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-dark" style="background-color: transparent; color: blue; border: 2px solid white;" href="{{ route('login') }}">Đã có tài khoản</a>
                                <button type="submit" class="btn btn-dark">Đăng Ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection