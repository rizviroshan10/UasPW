<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends BaseController
{
    public function index()
    {
        $trainer = Trainer::all();
        return $this->sendSuccess($trainer, 'Data Trainer');
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

        return $this->sendSuccess(null, 'Berhasil update data Trainer');
      }


    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'file|image',
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

        return $this->sendSuccess(null, 'Berhasil simpan data Trainer');

    }
    public function destroy(String $id)
    {
        $trainer = Trainer::find($id);
        // dd($trainer);
        $trainer->delete();
        return $this->sendSuccess(null, 'Berhasil hapus data Trainer');
    }
}
