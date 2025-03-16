@extends('layouts.app_modern', ['title' => 'Edit Data Siswa'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Edit Data <b>{{ $student->nama }}</b></h5>
                    <div class="card-body">
                        <form action="/student/{{ $student->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="form-group mt-1 mb-3">
                                <label for="name">Nama Siswa</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') ?? $student->name }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="gender">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="laki_laki" value="Laki-Laki" 
                                        {{ old('gender') ?? $student->gender === 'Laki-Laki' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="laki_laki">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" 
                                        {{ old('gender') ?? $student->gender === 'Perempuan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') ?? $student->email }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="phone">No. Telp</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') ?? $student->phone }}">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>

                            <div class="form-group mt-1 mb-3">
                                <label for="grade">Kelas</label>
                                <select class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade">
                                    <option value="">Pilih Kelas</option>
                                    @foreach(['XU.1', 'XU.2', 'XU.3', 'XU.4', 'XU.5', 'XU.6', 'XU.7', 'XU.8', 'XU.9', 'XU.10', 'XU.11'] as $gradeOption)
                                        <option value="{{ $gradeOption }}" {{ (old('grade') ?? $student->grade) == $gradeOption ? 'selected' : '' }}>
                                            {{ $gradeOption }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('grade') }}</span>
                            </div>
                            
                            <button type="reset" class="btn btn-warning">RESET</button>&nbsp;
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection