<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Header</title>
</head>
<body>
        {{-- <div class="Nav">
                <a href="home.php">
                    <button>
                        Become User
                    </button>
                </a>

            </div>

            <div class="Nav">
                <a href="Menu.php">
                    <button>
                    Menu
                    </button>
                </a>


            </div>

            <div class="Nav">
                <a href="karyawan.php">
                    <button>
                    Karyawan
                    </button>
                </a>
            </div> --}}
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Perpustakaan</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link {{Request::segment(1) == '' ? 'active': ''}}" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{Request::segment(1) == 'buku' ? 'active': ''}}" href="{{route('buku.index')}}">Buku</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{Request::segment(1) == 'kategori' ? 'active': ''}}" href="{{route('kategori.index')}}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Request::segment(1) == 'anggota' ? 'active': ''}}" href="{{route('anggota.index')}}">Anggota</a>
                          </li>
                      </ul>
                    </div>
                  </div>
              </nav>
              @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
