@extends('layout.main')
@section('title', 'Tambah Jadwal')
@section('content')
<div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Jadwal</h4>
                  <p class="card-description">
                   Isi Jadwal Trainer
                  </p>
                  <form class="forms-sample" action="{{ route('jadwal_trainer.update', $jadwal->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="hari">Hari</label>
                        <input  value="{{$jadwal_trainer->hari}}" type="text" class="form-control" name="hari" placeholder="Hari">
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
