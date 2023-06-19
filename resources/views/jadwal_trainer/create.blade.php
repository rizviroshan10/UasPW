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
                  <form class="forms-sample" action="{{ route('jadwal_trainer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="jadwal_id">Jadwal</label>
                        <input  type="text" class="form-control" name="jadwal_id" placeholder="jadwal">
                        @error('hari')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="trainer_id">Hari</label>
                        <input  type="text" class="form-control" name="trainer_id" placeholder="trainer">
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
