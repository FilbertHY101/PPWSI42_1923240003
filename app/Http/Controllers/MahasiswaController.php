<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal lahir,
        alamat, created_at) values (?, ?, ?, ?, ?, ?)', ['1922110006', 'Ahmad', 'Palembang',
        '2000-01-01', 'J1 Rajawali', now()]);
        dump($result);
    }
    
}
