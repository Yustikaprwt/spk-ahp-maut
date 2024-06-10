<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
</head>
<body>
    <nav class="navbar spk-navbar navbar-expand-lg">
        <div class="container-fluid container-navbar">
            <a class="navbar-brand">
                <img src="{{ asset('img/logo.png') }}" alt="logo" />
            </a>
            <button class="navbar-toggler bar-navbar" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <i style="color: #407b86" class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="/petunjuk">Petunjuk Pengisian</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cari Rekomendasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="rekomendasi">Rekomendasi Untuk Satu Orang</a>
                            <a class="dropdown-item" href="rekomendasi/dua">Rekomendasi Untuk Dua Orang</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="button-login">Masuk</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">@yield('container')</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
