<?php

namespace App\Http\Controllers;
// (namespace)digunakan untuk mengorganisasi kode menjadi bagian-bagian yang terpisah dan terstruktur, untuk mencegah tabrakan nama (name collisions) antara kelas, fungsi, atau konstanta. 
use App\Models\TaskList; //digunakan untuk mengimpor kelas TaskList yang berada dalam namespace App\Models. Dengan menggunakan use, kita bisa mengakses kelas TaskList tanpa perlu menulis namespace lengkapnya setiap kali kita ingin menggunakannya.
use Illuminate\Http\Request;//digunakan untuk mengimpor kelas Request dari namespace Illuminate\Http ke dalam file yang sedang bekerja. Kelas Request ini adalah bagian dari Laravel yang menangani permintaan HTTP dan menyediakan berbagai metode untuk mengakses data yang dikirimkan oleh pengguna melalui HTTP request, seperti input form, query parameter, file upload, dan banyak lagi.

Penjelasan:

class TaskListController extends Controller
{
    public function store(Request $request) { //
        $request->validate([ 
            'name' => 'required|max:100'  //user harus mengisi nama tidak lebih dari 100 huruh
        ]);

        TaskList::create([
            'name' => $request->name
        ]);

        return redirect()->back();
    }

    public function destroy($id) {
        TaskList::findOrFail($id)->delete();

        return redirect()->back();
    }
}