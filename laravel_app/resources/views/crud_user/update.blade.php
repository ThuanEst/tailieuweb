@extends('dashboard')

@section('content')
     <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Màn hình cập nhật</h2>
                <form action="{{ route('user.postUpdateUser') }}" method="POST" style="width: 500px; border: 1px solid rgba(0, 0, 0, 0.3)" class="p-4">
                     @csrf
                    <input name="id" type="hidden" value="{{$user->id}}">

                    <div class="form-group mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $user->name }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" value="{{ $user->password }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}" name="email" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3 d-flex justify-content-end"> <!-- Sử dụng lớp d-flex và justify-content-end để căn chỉnh nút sang phải -->
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>

                </form>
            </div>
        </div>
    </div>    
@endsection