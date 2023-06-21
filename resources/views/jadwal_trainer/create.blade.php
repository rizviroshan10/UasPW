@extends('layout.main')
@section('title', 'Tambah Jadwal Trainer')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Jadwal</h4>
                    <p class="card-description">
                        Isi Jadwal Trainer
                    </p>
                    <form class="forms-sample" action="{{ route('jadwal_trainer.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="jadwal_id">Jadwal</label>
                                <select name="jadwal_id" id="jadwal_id">
                                    <option value="">Pilih Jadwal</option>
                                    @foreach ($jadwal as $item)
                                        <option value="{{ $item->id }}">{{ $item->hari }}</option>
                                    @endforeach
                                </select>
                                @error('hari')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="jadwal_id">Trainer</label>
                            <select name="trainer_id" id="trainer_id">
                                <option value="">Pilih Trainer</option>
                                @foreach ($trainer as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('hari')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <a href="{{ route('jadwal_trainer.index') }}" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
