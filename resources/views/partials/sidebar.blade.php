<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> 
</head>
<body>
    <aside class="sidebar">
        <img src="{{ asset('img/logo_rounded.png') }}" alt="logo" />
        <ul>
            <li><i class="fa-solid fa-house-chimney-user"></i><a href="/alternatif">Data Alternatif</a></li>
            <li><i class="fa-solid fa-sliders"></i><a href="/skala/alternatif">Skala Alternatif</a></li>
            <li><i class="fa-solid fa-coins"></i><a href="/bobot/alternatif">Bobot Alternatif</a></li>
            <li style="margin-top: 260px; border-top: 1px solid black;"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                <a class="delete" href="#">Logout</a>
        </ul>
    </aside>  
    @yield('container')  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<script>
    $('.delete').click(function() {
        swal({
            title: "Konfirmasi Logout",
            text: "Apakah anda yakin untuk melakukan logout akun?",
            icon: "warning",
            buttons: ["Batal", "Ya"],
            dangerMode: true,
        })
        .then((willLogout) => {
            if (willLogout) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    });
</script>
</html>
