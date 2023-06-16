@extends('layout.main')
@section('title', 'Tambah Trainer')
@section('content')
<div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Trainer</h4>
                  <p class="card-description">
                    Formulir Tambah Trainer
                  </p>
                  <form class="forms-sample" action="{{ route('trainer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                        <label for="nama">Nama </label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                        @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group col-lg-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal_lahir">
                        @error('tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                   <div class="form-group col-lg-6">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" placeholder="">
                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenis_kelamin" placeholder="">
                        @error('jenis_kelamin')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="{{ route('trainer.index') }}" class="btn btn-light">Batal</a>
                  </form>
                </div>
              </div>
            </div>
</div>
@endsection
