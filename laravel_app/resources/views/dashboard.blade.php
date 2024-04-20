<!DOCTYPE html>
<html>

<head>
    <title>Laravel app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">

            <div class="collapse navbar-collapse text-center" id="navbarNav">

                <div class="collapse navbar-collapse" id="navbarNav">

                    <div class="collapse navbar-collapse text-center" id="navbarNav">
                        <ul class="navbar-nav">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.authUser') }}"> Laravel Crud</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.authUser') }}"> | Đăng nhập</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.createUser') }}"> | Đăng ký</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signout') }}"> | Đăng xuất</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
    </nav>
    @yield('content')
    <footer class="footer fixed-bottom border-top">
        <div class="container text-center">
            <h5>Lập trình web @01/2024</h5>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>