<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }} - {{ config('app.name') }}</title>
    {{-- digunakan untuk menampilkan judul halaman dinamis dalam sebuah template. --}}

    <!-- Import bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
</head>

<body> 
    {{-- body adalah wadah untuk menampilkan konten dan body itu penting agar tidak acak2an--}}
    @include('partials.navbar') <!-- Mengambil component navbar --> 
    {{--@include('partials.navbar') ADALAH < include digunakan untuk mengambil pungsi2 komponen yang ada didalam polder partials/navbar >--}}
    @yield('content') <!-- Render content --> 
    {{--  @yield itu digunakan untuk mendefinisikan tempat atau (section) didalam sebuah layout --}}
    @include('partials.modal') 
    {{-- @include('partials.modal') ADALAH <include digunakan untuk mengambil pungsi2 komponen yang ada didalam polder partials/modal> --}}

    <script src="{{ asset('js/script.js') }}"></script> 
    {{-- script itu untuk mencari mengambil --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import bootstrap JS -->
</body>

</html>