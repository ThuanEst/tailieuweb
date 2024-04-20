@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<div class="container-fluid view">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-center">Danh sách user </h3>
        <div class="container">
          <div class="container contaitable">
            <table class="table table-bordered border-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">UserName</th>
                  <th scope="col">Email</th>
                  <th scope="col">Favorities</th>
                  <th scope="col">Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->favorities }}</td>
                  <td>
                    <div class="row">
                      <div class="col ">
                        <a style="text-decoration:none" href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                        <a style="text-decoration:none" href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                        <a style="text-decoration:none" href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach


              </tbody>
            </table>

          </div>
        </div>
      </div>
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link prev" href="#" aria-label="Previous">
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link next" href="#" aria-label="Next">
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
      <div class="row border border-2 border-dark">
        <div class="col text-center">
          <h5>Lập trình web @ 9/4/2023</h5>
        </div>
      </div>

    </div>
  </div>



  @endsection