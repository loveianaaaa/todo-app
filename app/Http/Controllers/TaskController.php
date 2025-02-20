<?php

namespace App\Http\Controllers;

use App\Models\Task;//digunakan untuk menginfor model task agar bisa digunakan tanpa menuliskan namespace lengkap
use App\Models\TaskList;//digunakan untuk menginfor model taskList agar bisa digunakan tanpa menuliskan namespace lengkap
use Illuminate\Http\Request;//Kode use Illuminate\Http\Request; digunakan dalam Laravel untuk mengimpor kelas Request dari Laravel HTTP.

class TaskController extends Controller
{
    public function index() { //untuk mengambil dats pariabel yg ada didalam folder models/Task 
        $data = [
            'title' => 'Home', // untuk membuat judul dari tampilan home
            'lists' => TaskList::all(),// all(semua) lists untuk mengambil semua tasklist yang ada di folder models/TaskList
            'tasks' => Task::orderBy('created_at', 'desc')->get(),//orderby itu(mengurutkan dari yang terbesar ke yang terkecil) 
            'priorities' => Task::PRIORITIES //untuk mengambil nilai PRIORITIS/kondisi
        ];

        return view('pages.home', $data); //(return view) digunakan untuk mengembalikan tampilan (view) atau halaman kepada pengguna.
    }

    public function store(Request $request) { //(fungsi store) biasanya digunakan untuk menangani logika penyimpanan data baru ke dalam basis data
        $request->validate([
            'name' => 'required|max:100',
            'list_id' => 'required',
            'description' => 'nullable|max:100',
            'priority' => 'required|in:high,medium,low'
        ]);

        Task::create([ //Task::create adalah metode yang digunakan dalam Eloquent ORM di Laravel untuk membuat dan menyimpan data baru ke dalam tabel yang terkait dengan model Task.
            'name' => $request->name,
            'list_id' => $request->list_id,
            'description' => $request->description,
            'priority' => $request->priority
        ]);


        return redirect()->back();//(return redirect) dalam kode digunakan untuk mengarahkan pengguna ke halaman lain setelah melakukan aksi tertentu,seperti setelah mengirimkan form atau melakukan operasi tertentu (misalnya, menyimpan data ke database)Ini adalah bagian dari proses redirecting dalam pengembangan web.
    }

    public function about() {
        $data = [
            'title' => 'About Me',
        ];

        return view('pages.about', $data);
    }


    public function complete($id) { //(public function complete) biasanya digunakan untuk menangani logika yang berhubungan dengan menyelesaikan suatu tugas atau mengubah status suatu entitas menjadi "selesai" (complete). 
        Task::findOrFail($id)->update([ //Task::findOrFail() adalah metode Eloquent yang digunakan dalam Laravel untuk mencari sebuah entitas (model) berdasarkan primary key (biasanya ID). 
            'is_completed' => true  
        ]);

        return redirect()->back();
    }

    public function destroy($id) { // (public function destroy)untuk menangani proses penghapusan data dari database. Metode ini digunakan untuk menghapus entitas tertentu berdasarkan ID atau kriteria lain yang diberikan.
        Task::findOrFail($id)->delete();//(Task::findOrFail($id)->delete) adalah pendekatan yang lebih ringkas dalam Laravel untuk mencari dan langsung menghapus data dalam satu baris kode.

        Penjelasan:

        return redirect()->route('home');//redirect() → Fungsi helper Laravel untuk melakukan pengalihan.
        //back() → Mengarahkan pengguna kembali ke halaman sebelumnya yang dikunjungi.
        //return → Mengembalikan respons ke browser, sehingga proses selesai.
    }
    public function show($id)// digunakan untuk menampilkan data berdasarkan ID tertentu. 
    {
        $data = [
            'title' => 'Task',//Ini menetapkan judul halaman atau judul data yang bisa digunakan dalam tampilan (view) atau API.
            'lists' => TaskList::all(),// Mengambil semua data dari tabel task_lists di database.
            'task' => Task::findOrFail($id),// Mencari satu data tugas berdasarkan ID.
        ];

        return view('pages.details', $data);//return view Mengembalikan halaman details.blade.php dengan data yang                                        dikirim dari controller. pages.details → Menunjuk ke file resources/views/pages/details.blade.php.                                                 $data → Berisi array data yang akan dikirim ke view
    }

    public function changeList(Request $request, Task $task)
    { //Kode berikut adalah sebuah method dalam controller Laravel yang menerima permintaan                                                                    dari pengguna untuk mengubah Task List dari sebuah Task (tugas) tertentu
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }
    public function update(Request $request, Task $task)
    {//Method ini digunakan dalam Laravel Controller untuk mengupdate data dari sebuah Task (tugas) yang sudah ada di database.
        $request->validate([ //Kode di atas digunakan dalam Laravel Controller untuk melakukan                                                              validasi input sebelum data disimpan atau diperbarui dalam database.
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
        //->Mengembalikan pengguna ke halaman sebelumnya setelah suatu aksi dilakukan.                                                                 2.2.2    ->Menampilkan pesan sukses di halaman tersebut.
    }
}
 