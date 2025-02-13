@extends('layouts.app')

@section('content')
    <div id="content" class="container pb-3">e
        <div class="d-flex aligh-items-center justify-content center">
            <a href="{{ route('home') }}" class="btn btn-sm fw-bold fs-4">
                <i class="bi bi-arrow-left-short"></i>
                kembali
            </a>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="card" style="height: 80vh; max-height: 80vh;">
                    {{-- kode untuk ukuran lebar panjangnya --}}
                    <div class="card-header d-flex align items center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate" style="max-width: 80%;">{{ $task->name }}
                            <span class="fs-6 fw-medium">di {{ $task->name }}
                                di {{ $task->list->name}}
                            </span>
                        </h3>
                        <button class="btn btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $task->description }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('tasks.destroy', $task->id) }}"
                            method="POST">
                            @csrf 
                            @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger w-100">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="height: 80vh; max-height: 80vh;">
                    <div class="card"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
