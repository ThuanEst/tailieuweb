@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="view">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Màn hình chi tiết</h3>
                <table>
                    <tr>
                        <td>Username</td>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <td>Favorities</td>
                        <td>{{ $user->favorities }}</td>
                    </tr>
                </table>
                <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn-edit">Chỉnh sửa</a>
            </div>
        </div>
    </div>
</div>

@endsection