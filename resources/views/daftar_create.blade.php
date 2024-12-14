{{-- Novan Nur Zulhilmi Yardana --}}
@extends('layouts.app_modern', ['title' => 'Tambah Data Pasien'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Form Pasien</div> --}}
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Pasien</h5>
                        <form action="/daftar" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="tanggal_daftar">Tanggal Daftar</label>
                                <input type="date" class="form-control" value="{{ old ('tanggal_daftar') ?? date ('Y-m-d') }}"
                                    name="tanggal_daftar">
                                <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="pasien_id">Nama Pasien</label>
                                <select name="pasien_id" class="form-control">
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach ($listPasien as $item)
                                        <option value="{{ $item->id }}" @selected (old('pasien_id') == $item->id)>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
                            </div>
                            <div class="form-group mt-3">
                                <label for="poli_id">Poli</label>
                                <select name="poli_id" class="form-control">
                                    <option value="">-- Pilih Poli --</option>
                                    @foreach ($listPoli as $item)
                                    <option value="{{ $item->id }}" @selected(old('poli_id') == $item->id)>{{ $item->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('poli_id') }}</span>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="keluhan">Keluhan</label>
                                <textarea name="keluhan" rows="2" class="form-control">{{ old('keluhan') }}</textarea>
                                <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection