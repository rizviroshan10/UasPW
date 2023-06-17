<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //
     
    public function index()
    {
        $jadwal = Jadwal::all();
        return view ('jadwal.index')->with('jadwal', $jadwal);
    }

    public function create(){
        return view('jadwal.create');
    }
    public function edit(String $id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwal.edit')->with('jadwal', $jadwal);
    }
    public function update(Request $request, Jadwal $jadwal)
    {
        $validasi = $request->validate([
            'hari' => 'required',
            'jam' => 'string',
            'pertemuan' => 'required',
        ]);

        $jadwal = new Jadwal();
        $jadwal->hari = $validasi['hari'];
        $jadwal->jam = $validasi['jam'];
        $jadwal->pertemuan = $validasi['pertemuan'];


        return redirect()->route('jadwal.index')->with('success', "Data jadwal " . $validasi['nama'] . " berhasil diubah");
    }


    public function store(Request $request)
    {
        $validasi = $request->validate([
            'hari' => 'required',
            'jam' => 'string',
            'pertemuan' => 'required',
        ]);

        $jadwal = new Jadwal();
        $jadwal->hari = $validasi['hari'];
        $jadwal->jam = $validasi['jam'];
        $jadwal->pertemuan = $validasi['pertemuan'];


        return redirect()->route('jadwal.index')->with('success', "Data jadwal " . $validasi['nama'] . " berhasil disimpan");
    }
    public function destroy(String $id)
    {
        $jadwal = Jadwal::find($id);
        // dd($jadwal);
        $jadwal->delete();
        //return redirect()->route('jadwal.index')->with('success', 'Data berhasil dihapus');
        return response("Selected trainer (s) deleted successfully.", 200);
    }

}
