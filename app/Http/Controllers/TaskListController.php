<?php

namespace App\Http\Controllers;
//digunakan untuk mengorganisasi kode menjadi bagian-bagian yang terpisah dan terstruktur,                                            untuk mencegah tabrakan nama  antara kelas, fungsi, atau konstanta. 
use App\Models\TaskList; //digunakan untuk mengimpor kelas TaskList yang berada dalam namespace App\Models.                                         Dengan menggunakan use, kita bisa mengakses kelas TaskList tanpa perlu menulis namespace lengkapnya                                              setiap kali kita ingin menggunakannya.
use Illuminate\Http\Request;//digunakan untuk mengimpor kelas Request dari namespace                                                         Illuminate\Http ke dalam file yang sedang bekerja.
Penjelasan:

class TaskListController extends Controller //menunjukkan bahwa TaskListController adalah sebuah                                                  controller yang mewarisi (extends) dari Controller utama Laravel.
{
    public function store(Request $request) { //
        $request->validate([ 
            'name' => 'required|max:100'  //user harus mengisi nama tidak lebih dari 100 huruh
        ]);

        TaskList::create([ //berfungsi untuk menambahkan data baru ke dalam tabel yang                                                           berhubungan dengan model TaskList.


            'name' => $request->name
        ]);

        return redirect()->back(); //adalah perintah dalam Laravel (PHP framework) yang digunakan                                                untuk mengarahkan pengguna kembali ke halaman sebelumnya.
    }

    public function destroy($id) { //destroy($id) dalam Laravel biasanya digunakan untuk menghapus                                                data dari database berdasarkan ID yang diberikan.
        TaskList::findOrFail($id)->delete();
        //findOrFail($id) Mencari data berdasarkan ID.
        //delete() Jika data ditemukan, maka data akan dihapus dari database.

        return redirect()->back();
    }
}