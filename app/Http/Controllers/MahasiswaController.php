<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir,
        alamat, created_at) values (?, ?, ?, ?, ?, ?)', ['1922110006', 'Ahmad', 'Palembang',
        '2000-01-01', 'J1 Rajawali', now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Ali",
        updated_at = now() where npm = ?', ['1922110006']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?',
        ['1922110006']);
        dump($result);
    }

    public function select()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        //dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    //Qb
    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '1923250001',
                'nama_mahasiswa' => 'umar',
                'tempat_lahir' =>'jakarta',
                'tanggal_lahir' => '2001-01-01',
                'alamat' => 'Jl. Sudirman',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
            ->where('npm', '1923250001')
            ->update(
                [
                    'nama_mahasiswa' => 'usman',
                    'updated_at' => now()
                ]
            );
        dump($result);
    }

    public function deleteQb()
    {
        $result = DB::table('mahasiswas')
            ->where('npm', '=', '1923250001')
            ->delete();
        dump($result);
    }

    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        //dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    //Elq
    public function insertElq()
    {
        $mahasiswa = new Mahasiswa; // Instalasi Class Mahasiswa
        $mahasiswa->npm = '1923240001'; // Isi Property
        $mahasiswa->nama_mahasiswa = 'Zainab';
        $mahasiswa->tempat_lahir = 'Bandung';
        $mahasiswa->tanggal_lahir = '2002-01-01';
        $mahasiswa->alamat = 'Jl. Bambang Utoyo';
        $mahasiswa->save(); // Menyimpan Data ke tabel mahasiswas
        dump($mahasiswa); // Melihat Isi $mahasiswa
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1923240001')->first(); // Cari Data tabel mahasiswas berdasarkan npm
        $mahasiswa->nama_mahasiswa = 'Khadijah';
        $mahasiswa->save(); // Menyimpan Data ke tabel mahasiswas
        dump($mahasiswa); // Melihat Isi $mahasiswa
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1923240001')->first(); // Cari Data tabel mahasiswas berdasarkan npm
        $mahasiswa->delete(); // Hapus Data Melalui NPM 1923240001
        dump($mahasiswa); // Melihat Isi $mahasiswa
    }

    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        //dump($allmahasiswa);
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
        
    }

}
