@extends('layouts.app')
{{-- Blade sintaks untuk mewarisi template utama --}}
@section('content')
{{-- Menentukan bagian konten yang dimasukkan ke dalam template utama --}}
<div id="content" class="container pb-3">
    {{-- Elemen utama dengan ID "content" untuk styling dan responsivitas --}}
    <div class="d-flex align-items-center justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-sm fw-bold fs-4">
            <i class="bi bi-arrow-left-short"></i> kembali
        </a>
    </div>

    @session('success')
    {{-- Menampilkan pesan sukses --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endsession

    <div class="row">
        <div class="col-md-8">
            <div class="card h-100">
                {{-- Kartu utama untuk menampilkan detail tugas --}}
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="fw-bold fs-5 text-truncate" style="max-width: 80%;">
                        {{ $task->name }}
                        <span class="fs-6 fw-medium">di {{ $task->list->name }}</span>
                    </h3>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTaskModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>
                <div class="card-body">
                    <p>{{ $task->description }}</p> 
                    {{-- Menampilkan deskripsi tugas (description) dari objek $task dalam elemen <p> (paragraf) di halaman web. --}}
                </div>
                <div class="card-footer">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf @method("DELETE")
                        <button type="submit" class="btn btn-outline-danger w-100">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                {{-- Kartu untuk menampilkan detail tambahan --}}
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="fw-bold fs-5 text-truncate mb-0">Details</h3>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <select class="form-select" name="list_id" onchange="this.form.submit()">
                            @foreach ($lists as $list)
                                <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <h6 class="fs-6">
                        Prioritas:
                        <span class="badge text-bg-{{ $task->priorityClass }}" style="width: fit-content">
                            {{ $task->priority }}
                            {{-- Menampilkan nilai prioritas dari objek $task di halaman web. --}}
                        </span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        {{-- Membuat modal Bootstrap untuk mengedit tugas. --}}
        <div class="modal-dialog">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                @method('PUT') @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-6" id="editTaskModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    {{-- digunakan dalam struktur modal (kotak dialog pop-up) untuk menampung isi utama modal. --}}
                    <input type="hidden" value="{{ $task->list_id }}" name="list_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" placeholder="Masukkan nama list">
                    </div>
                    <div class="mb-3">
                        {{-- digunakan dalam framework Bootstrap untuk memberikan margin bawah (mb - margin-bottom) sebesar 3 (0.75rem atau 12px). --}}
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        {{-- digunakan untuk memberi label pada elemen formulir, dalam hal ini elemen yang memiliki id="priority" --}}
                        <select class="form-control" name="priority" id="priority">
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- digunakan dalam struktur Bootstrap modal untuk menampung tombol aksi di bagian bawah modal,                                   seperti tombol "Tutup" atau "Simpan".  --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
