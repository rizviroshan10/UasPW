@extends('layout.main')

@section('title', 'Halaman Jadwal Trainer')
@section('subtitle', 'Jadwal')
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
                    <h4 class="card-title">Jadwal Trainer</h4>
                    <a href="{{ route('jadwal_trainer.create') }}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Jadwal </th
                                    <th>Trainer </th
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $item)
                                    <tr>
                                        <td> {{ $item->jadwal->hari}} </td>
                                        <td> {{ $item->trainer->nama}} </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('jadwal_trainer.edit', $item->id) }}"><button
                                                        class="btn btn-success btn-sm mr-2">Edit</a>
                                                <form method="post" class="delete-form"
                                                    data-route="{{ route('jadwal_trainer.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                        </td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.jqueryscript.net/demo/check-all-rows/dist/TableCheckAll.js"></script>
    <style>
        .swal-title {
            margin: 0px;
            color:black
            font-size: 16px;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.21);
            margin-bottom: 28px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                var button = $(this);
                Swal.fire({
                    icon: 'warning',
                    title: "<h1 style='color:black;' >Apa Kamu Yakin Untuk Menghapus Data Ini?</h1>",
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: button.data('route'),
                            data: {
                                '_method': 'delete'
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: "<h1 style='color:black;' >Data Berhasil Di Hapus</h1>",
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                }).then((result) => {
                                    window.location = window.location.href
                                });
                            }
                        });
                    }
                });

            })
        });
    </script>


@endsection
