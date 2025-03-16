@extends('layouts.app_modern')

@section('content')
    <div class="container">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        @if(session('success'))
                            <script>
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "{{session('success')}}",
                                });
                            </script>
                        @endif
                        
                        <div class="row mb-3 mt-3">
                            <div class="col-md-3 h3">
                                Data Siswa
                            </div>
                            <div class="col-md-6">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" name="po" placeholder="Cari Nama atau No Student" value="{{ request('po') }}" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                  </form>
                            </div>
                            <div class="col-md-3">
                                <a href="/student/create" class="btn btn-primary btn-md float-end">
                                    Tambah Data Siswa
                                </a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">NO</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>No.Telp</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> 
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->grade }}</td>
                                        <td>
                                            <a href="/student/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">
                                                Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm ml-2" 
                                                onclick="confirmDelete('{{ $item->id }}', '{{ $item->name }}')">
                                                Hapus
                                            </button>
                                            <form id="delete-form-{{ $item->id }}" action="/student/{{ $item->id }}" method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $student->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id, name) {
            Swal.fire({
                title: "Yakin menghapus data " + name + "?",
                text: "Data akan terhapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus data!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form delete
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection