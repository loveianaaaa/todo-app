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
    public function show($id) {
        $task = Task::FindOrfail($id);

        $data = [
            'title' => 'Details',
            'task' => $task,
        ];
        return view('pages.details', $data); 
        //view('pages.details') → Menunjukkan bahwa Laravel akan mencari file resources/views/pages/details.blade.php.
        //$data → Variabel $data akan diteruskan ke view tersebut agar dapat digunakan dalam tampilan.
    }
}
 