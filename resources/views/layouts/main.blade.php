<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Masyarakat</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>
<body class="bg-info">
    <header class="bg-white">
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                
                <div class>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Pengaduan</a>
                    </li>
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item active">
                        <a class="nav-link" href="/petugas">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/masyarakat">masyarakat</a>
                    </li>
                    @endif
                    </ul>
                </div>
                <div class="d-flex flex-row-reverse">
                    @if(Auth::check())
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->nama}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            @if(Auth::check() && Auth::user()->role == 'masyarakat')
                            <a class="dropdown-item" href="/pengaduanku">Pengaduan Ku</a>
                            <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                        </div>
                    @else
                    <a href="/login">
                        <button class="btn btn-outline-info ms-2">
                            Login
                        </button>
                    </a>
                    <a href="/register">
                        <button class="btn btn-outline-info ms-2">
                            Register
                        </button>
                    </a>
                    @endif
                    
                </div>
            </div>
            
        </nav>
    </header>
    <div class="bg-info py-1 vh-100">
    <div class="container my-5 bg-info">
    <div class="card bg-light p-3">
        @yield('content')
    </div>
    </div>
    </div>
</body>
</html>