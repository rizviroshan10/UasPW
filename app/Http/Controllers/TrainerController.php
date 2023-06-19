<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    
    public function index()
    {
        $trainer = Trainer::all();
        return view ('trainer.index')->with('trainer', $trainer);
    }

    public function create(){
        return view('trainer.create');
    }
    public function edit(String $id)
    {
        $trainer = Trainer::find($id);
        return view('trainer.edit')->with('trainer', $trainer);
    }
    public function update(Request $request, Trainer $trainer)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $trainer->nama = $validasi['nama'];
        $trainer->tanggal_lahir = $validasi['tanggal_lahir'];
        $trainer->jenis_kelamin = $validasi['jenis_kelamin'];

        // upload foto
        $ext = $request->foto->getClientOriginalExtension();
        $new_filename = $validasi['nama'] . "." . $ext;
        $request->foto->storeAs('public', $new_filename);

        $trainer->foto = $new_filename;

        $trainer->save(); // simpan

        return redirect()->route('trainer.index')->with('success', "Data trainer " . $validasi['nama'] . " berhasil diubah");
    }


    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $trainer = new Trainer();
        $trainer->nama = $validasi['nama'];
        $trainer->tanggal_lahir = $validasi['tanggal_lahir'];
        $trainer->jenis_kelamin = $validasi['jenis_kelamin'];

        // upload foto
        $ext = $request->foto->getClientOriginalExtension();
        $new_filename = $validasi['nama'] . "." . $ext;
        $request->foto->storeAs('public', $new_filename);

        $trainer->foto = $new_filename;

        $trainer->save(); // simpan

        return redirect()->route('trainer.index')->with('success', "Data trainer " . $validasi['nama'] . " berhasil disimpan");
    }
    public function destroy(String $id)
    {
        $trainer = Trainer::find($id);
        // dd($trainer);
        $trainer->delete();
        //return redirect()->route('trainer.index')->with('success', 'Data berhasil dihapus');
        return response("Selected trainer (s) deleted successfully.", 200);
    }

}

