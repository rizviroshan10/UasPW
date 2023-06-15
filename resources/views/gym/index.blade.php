@extends('layout.main')

@section('title', 'Halaman Fakulltas')
@section('subtitle', 'Fakultas')
@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            @if (Session::get('success'))
                <div class="alert alert-success">
                {{ Session::get('success') }}
                </div>
            @endif
            <h4 class="card-title">Trainer</h4>
            <a href="{{ route('gym.create') }}" class="btn btn-primary">Tambah</a>
            <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                        <tr>
                            <th>Nama </th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Created At</th>
                        </tr>
                </thead>
                <tbody>
                @foreach ($gym as $item)
                    <tr>
                        <td>  {{ $item->nama}}  </td>
                        <td>  {{ $item->tanggal_lahir }}  </td>
                        <td>  {{ $item->jenis_kelamin }}  </td>
                        <td>  {{ $item->foto}}  </td>
                        <td>  {{ $item->created_at}}  </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- row end -->
@endsection
