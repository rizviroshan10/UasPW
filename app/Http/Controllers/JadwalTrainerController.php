<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\JadwalTrainer;
use App\Models\Trainer;
use Illuminate\Http\Request;

class JadwalTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = JadwalTrainer::all();
        return view ('jadwal_trainer.index')->with('jadwal', $jadwal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $trainer = Trainer::all();
        return view ('jadwal_trainer.create')
        ->with('jadwal', $jadwal)
        ->with('trainer', $trainer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'jadwal_id' => 'required',
            'trainer_id' => 'required',
        ]);

        $jadwal = new JadwalTrainer();
        $jadwal->jadwal_id = $validasi['jadwal_id'];
        $jadwal->trainer_id = $validasi['trainer_id'];
        $jadwal->save();

        return redirect()->route('jadwal_trainer.index')->with('success', "Data jadwal " . $validasi['jadwal_id'] . " berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal_trainer = JadwalTrainer::find($id);
        $jadwal = Jadwal::all();
        $trainer = Trainer::all();
        return view ('jadwal_trainer.edit')
        ->with('jadwal', $jadwal)
        ->with('jadwal_trainer', $jadwal_trainer)
        ->with('trainer', $trainer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'jadwal_id' => 'required',
            'trainer_id' => 'required',
        ]);

        $jadwal = JadwalTrainer::find($id);
        $jadwal->jadwal_id = $validasi['jadwal_id'];
        $jadwal->trainer_id = $validasi['trainer_id'];
        $jadwal->save();

        return redirect()->route('jadwal_trainer.index')->with('success', "Data jadwal " . $validasi['jadwal_id'] . " berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::find($id);
        // dd($jadwal);
        $jadwal->delete();
        //return redirect()->route('jadwal.index')->with('success', 'Data berhasil dihapus');
        return response("Selected trainer (s) deleted successfully.", 200);
    }
}
