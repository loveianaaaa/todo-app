@extends('layouts.app') 
{{-- digunakan untuk mewarisi layout utama dari aplikasi. Dengan menggunakan @extends,dapat membuat
 tampilan halaman yang menggunakan struktur dan elemen dasar dari layout utama,sambil tetap memungkinkan
  konten halaman untuk diubah atau diperbarui sesuai kebutuhan. --}}
@section('content')
    <div id="content" class ="overflow-y-hidden overflow-x-hidden bg-light-50">
        {{-- div digunakan untuk membungkus suatu isi konten seperti(p,button,dll)  --}}
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                {{-- p class digunakan untuk membungkus paragraf atau kata2nya/warna (fw-bold text-center untuk
                 menebalkan warna text dan rata tengah--}}
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-primary"
                {{-- button itu tombol --}}
                    style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif
        {{-- adalah sintaks yang digunakan dalam beberapa bahasa pemrograman atau framework,
         terutama dalam Blade Template Engine di Laravel (PHP). --}}
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
            @foreach ($lists as $list) 
            {{-- foreach adalah directive dalam Blade template Laravel yang digunakan 
            untuk melakukan perulangan (loop) pada sebuah array atau koleksi data --}}
                <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">{{ $list->name }}</h4>
                        {{-- h4 class untuk adalah elemen dalam HTML yang digunakan untuk membuat 
                        judul atau heading tingkat ke-4--}}
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            {{--(form action) action adalah atribut dalam elemen <form> di HTML yang menentukan ke mana data
                                 formulir akan dikirim setelah pengguna mengirimkan formulir. --}}
                            @csrf
                            @method('DELETE') 
                            {{-- (@method'DELETE') digunakan untuk mengirimkan permintaan HTTP DELETE melalui form --}}
                                <i class="bi bi-trash fs-5 text-primary"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($tasks as $task)
                        {{--(@foreach ($tasks as $task) digunakan untuk melakukan iterasi (perulangan) pada sebuah koleksi data. --}}
                            @if ($task->list_id == $list->id)
                            {{-- if digunakan unutk mengecek kondisi --}}
                                <div class="card">
                                    <div class="card9-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <p
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{--fw-bold: Membuat teks menjadi bold (tebal).
                                                    (lh-1) Mengatur line-height menjadi lebih rapat, yaitu 1 kali ukuran font.
                                                    (m-0) Menghilangkan margin (margin: 0) di semua sisi elemen..--}}
                                                    {{ $task->name }}
                                                </p>
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    {{-- adalah elemen tombol dalam HTML yang digunakan dalam form untuk mengirimkan data. (type="submit") menentukan bahwa tombol ini akan mengirimkan form ketika diklik.--}}
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                        {{-- div digunakan untuk membungkus suatu isi konten seperti(p,button,dll) --}}
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
                                                {{--(method('PATCH')) digunakan untuk mengirimkan
                                                 permintaan HTTP PATCH melalui sebuah form. --}}
                                                <button type="submit" class="btn btn-sm btn-secondary w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        {{--(span)digunakan untuk membungkus teks atau konten di dalamnya--}}
                                                        <i class="bi bi-check fs-5"></i>
                                                        {{-- (i)digunakan untuk menampilkan ikon atau teks dengan gaya tertentu --}}
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>
                                           {{-- adalah tag penutup untuk elemen --}}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach 
                        {{-- (@endforeach) adalah salah satu direktif di Blade templating engine 
                         yang digunakanuntuk mengakhiri sebuah loop @foreach di Laravel --}}
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                {{-- (i)digunakan untuk menampilkan ikon atau teks dengan gaya tertentu --}}
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        {{--(card-footer)adalah kelas yang diberikan oleh Bootstrap untuk mendesain bagian footer dari komponen card. 
                        (d-flex)adalah kelas dari Bootstrap yang mengubah elemen menjadi kontainer flexbox.
                        (justify-content-between)adalah kelas Flexbox di Bootstrap yang mengatur elemen-elemen anak di dalam kontainer flex untuk memiliki ruang yang sama di antara mereka, sehingga elemen pertama ditempatkan di ujung kiri dan elemen terakhir di ujung kanan.(align-items-center)adalah kelas Flexbox di Bootstrap yang digunakan untuk menyelaraskan (align) elemen anak secara vertikal di tengah kontainer flex. --}}
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            <button type="button" class="btn btn-flex-shrink-0"succes   style="width: 18rem; height: fit-content;"
            {{-- button adalah tombol --}}
                data-bs-toggle="modal" data-bs-target="#addListModal">
                {{--(data-bs-toggle)digunakan dalam Bootstrap untuk menginisiasi interaksi 
                dengan komponen berbasis JavaScript tanpa memerlukan kode JavaScript manual.--}}
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>
@endsection
