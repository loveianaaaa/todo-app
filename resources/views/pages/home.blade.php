@extends('layouts.app') 
{{-- digunakan untuk mewarisi layout utama dari aplikasi. Dengan menggunakan @extends, dapat membuat
tampilan halaman yang menggunakan struktur dan elemen dasar dari layout utama, sambil tetap memungkinkan
konten halaman untuk diubah atau diperbarui sesuai kebutuhan. --}}
@section('content')<style>
    /* ====== Background Styling dengan Efek Paralaks ====== */
    #content {
        background: url('{{ asset('images/bg-love.jpeg') }}') center/cover fixed no-repeat;
        color: white;
        /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
        min-height: 100vh;
    }
    /* ====== Efek Glassmorphism pada Card ====== */
    .card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
         /* transition: transform 0.3s ease-in-out; Menambahkan efek transisi halus saat tombol mengalami perubahan (misalnya saat di-hover)*/
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* ====== Tombol dengan Bootstrap Gradient & Hover ====== */
    .btn-gradient {
        background: linear-gradient(135deg, #ff7eb3, #ff758c);
       /* Membuat warna latar belakang tombol berupa gradasi dari warna pink cerah (#ff7eb3) ke pink gelap (#ff758c) dengan sudut 135 derajat.*/
        color: white;
      /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
        font-weight: bold;
        font-weight: bold;
        /* Membuat teks di dalam tombol menjadi lebih tebal.*/
        transition: transform 0.3s ease-in-out;
    }

    .btn-gradient:hover {
        transform: scale(1.1);
       
        background: linear-gradient(135deg, #ff758c, #ff7eb3);
        
    }

    /* ====== Badge Bootstrap dengan Animasi ====== */
    .badge-animated {
        animation: bounce 1s infinite alternate;
    }

    @keyframes bounce {
        from {
            transform: translateY(0);
        }
        to {
            transform: translateY(-3px);
        }
    }

    /* ====== Tombol Tambah dengan Efek Pulse ====== */
    .btn-add {
        background: linear-gradient(135deg, #42e695, #3bb2b8);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        transition: all 0.3s ease-in-out;
        animation: pulse 1.5s infinite;
        border: none;
    }

    .btn-add:hover {
        transform: scale(1.15);
        box-shadow: 0 0 15px rgba(66, 230, 149, 0.5);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 10px rgba(66, 230, 149, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(66, 230, 149, 0.6);
        }
        100% {
            box-shadow: 0 0 10px rgba(66, 230, 149, 0.3);
        }
    }
</style>
<div id="content" class=" min-vh-100 d-flex flex-column align-items-center py-4"> 
    <h1 class="text-secondary fw-bold">JADWAL LATIHAN</h1>
   
    <div id="content" class="overflow-y-hidden overflow-x-hidden bg-light-50">
        {{-- div digunakan untuk membungkus suatu isi konten seperti (p, button, dll) --}}
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                {{-- p class digunakan untuk membungkus paragraf atau kata-kata (fw-bold text-center untuk
                menebalkan warna teks dan rata tengah) --}}
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-primary"
                    style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif
        {{-- adalah sintaks yang digunakan dalam beberapa bahasa pemrograman atau framework,
        terutama dalam Blade Template Engine di Laravel (PHP). --}}

        <div class="nav-item dropdown">
            <a href="{{ route('about') }}" class="nav-link">
                <img class="rounded-circle me-lg-2" src="images/love.jpg" alt=""
                    style="width: 40px; height: 40px" />
                <span class="d-none d-lg-inline-flex text-primary   k">Identitas :> </span>
            </a>
        </div>

        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
            @foreach ($lists as $list) 
                {{-- foreach adalah directive dalam Blade template Laravel yang digunakan 
                untuk melakukan perulangan (loop) pada sebuah array atau koleksi data --}}
                <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                        <h4 class="card-title">{{ $list->name }}</h4>
                        {{-- h4 class adalah elemen dalam HTML yang digunakan untuk membuat 
                        judul atau heading tingkat ke-4 --}}
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            {{-- (form action) action adalah atribut dalam elemen <form> di HTML yang menentukan ke mana data
                            formulir akan dikirim setelah pengguna mengirimkan formulir. --}}
                            @csrf
                            @method('DELETE') 
                            {{-- (@method 'DELETE') digunakan untuk mengirimkan permintaan HTTP DELETE melalui form --}}
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($tasks as $task)
                            {{-- (@foreach ($tasks as $task)) digunakan untuk melakukan iterasi (perulangan) pada sebuah koleksi data. --}}
                            @if ($task->list_id == $list->id)
                                {{--<a href="{{ route('tasks.show', $task->id )}}" if digunakan untuk mengecek kondisi --}}
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <a  href="{{ route('tasks.show', $task->id )}}"
                                                class="fw-bold lh-1 m-0 {{ $task->is_completed ?
                                                 'text-decoration-line-through' : '' }}">
                                                    {{-- fw-bold: Membuat teks menjadi bold (tebal).
                                                    (lh-1) Mengatur line-height menjadi lebih rapat, yaitu 1 kali ukuran font.
                                                    (m-0) Menghilangkan margin (margin: 0) di semua sisi elemen. --}}
                                                    {{ $task->name }}
                                                </a>
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                {{-- Elemen block seperti <div> atau <p> secara default akan memulai baris baru.                              Dengan display: inline;, elemen tetap berada dalam satu baris dengan elemen lainnya. --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-truncate">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                {{-- (method 'PATCH') digunakan untuk mengirimkan
                                                permintaan HTTP PATCH melalui sebuah form. --}}
                                                <button type="submit" class="btn btn-sm btn-secondary w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i>
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach 
                        {{-- (@endforeach) adalah salah satu direktif di Blade templating engine
                        yang digunakan untuk mengakhiri sebuah loop @foreach di Laravel --}}
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            <button type="button" class="btn btn-flex-shrink-0 bg-primary text-white" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                {{-- (data-bs-toggle) digunakan dalam Bootstrap untuk menginisiasi interaksi 
                dengan komponen berbasis JavaScript tanpa memerlukan kode JavaScript manual. --}}
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>
@endsection
