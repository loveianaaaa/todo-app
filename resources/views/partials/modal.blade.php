<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
             {{-- form action digunakan untuk mengarahkan data validasi store --}}
            @method('POST')
            @csrf
            <div class="modal-header bg-primary"> 
                {{-- Kode yang Anda berikan adalah bagian dari elemen modal di HTML dengan kelas modal-header yang memiliki latar belakang berwarna hijau (bg-success). Biasanya, ini digunakan dalam kerangka kerja Bootstrap untuk menampilkan header dari modal dengan gaya tertentu. --}}
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                {{-- <h1> → Tag heading untuk menampilkan teks dengan ukuran besar.
                modal-title → Kelas bawaan Bootstrap untuk styling judul modal
                fs-5 → Kelas Bootstrap untuk mengatur ukuran font menjadi relatif kecil (tingkatan 5 dari Bootstrap font sizing).
                id="addListModalLabel" → ID ini digunakan untuk menghubungkan elemen ini dengan atribut aria-labelledby                                         pada modal agar lebih aksesibel. --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    {{-- Kode tersebut adalah elemen label dalam formulir HTML yang digunakan untuk memberi                                            keterangan pada input dengan id="name". --}}
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                        {{-- Kode yang Anda berikan adalah elemen input dalam HTML yang digunakan untuk memasukkan teks.  --}}
                </div>
            </div>
            <div class="modal-footer">
                {{-- digunakan dalam desain antarmuka berbasis Bootstrap atau framework lain yang mendukung modal (kotak dialog popup). --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="addTaskModalLabel">Tambah Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="taskListId" name="list_id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
                <div class="mb-3">
                    {{-- (mb-3) dibuat untuk margin bottom atau memberi jarak agar tidak berdekatan --}}
                    <label for="description" class="form-label">Deskripsi :</label> 
                    {{-- form-label digunakan untuk menyamakan ukuran infut --}}
                    {{-- label adalah elemen yang di gunnakan untuk memberi informasi tambahan tentang elemen yang akan di infut --}}
                    <input type="text" class="form-control" id="description" name="description"
                    {{-- <input type="text" digunakan untuk menampilkan form yang akan diisi --}}
                    {{-- class="form-control"digunakan untuk menyamakan ukuran agar tidak beramtakan--}}
                    {{-- id="description" untuk pengenal --}}
                        placeholder="Apakah deskripsi kegiatan anda??🤔">
                        {{-- placeholder adalah atribut dalam infut yang memberikan text petunjuk dalam kolom infut --}}
                </div>
                <div class="col-md-12 mb-3"> 
                {{-- (mb-3) dibuat untuk margin bottom atau memberi jarak agar tidak berdekatan --}}
                    <label for="priority" class="form-label">Priority :</label>
                    <select class="form-control" name="priority" id="taskListId" name="list_id" required>
                        {{-- select adalah menu drofdawn yang memungkinkan pengguna memilih satu atau beberapa opsi --}}
                        <option value="medium">Medium</option> 
                        {{-- option adalah elemen yang digunakan untuk mendefinisikan pilihan atau menu dari dropdawn select --}}
                        <option value="high">High</option> 
                        <option value="low">Low</option>
                    </select>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>