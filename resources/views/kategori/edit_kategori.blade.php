@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Kategori</div>

                <div class="card-body">
                    <form method="POST" action="/index_kategori/{{ $data->id }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="namaKategori" class="col-md-4 col-form-label text-md-end">Jenis Kategori</label>
                            <div class="col-md-6">
                                <input id="namaKategori" type="text" class="form-control @error('namaKategori') is-invalid @enderror" name="namaKategori" value="{{ $data->namaKategori }}" required autofocus>

                                @error('namaKategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="descKategori" class="col-md-4 col-form-label text-md-end">Deskripsi Kategori</label>
                            <div class="col-md-6">
                                <input id="descKategori" type="text" class="form-control @error('descKategori') is-invalid @enderror" name="descKategori" value="{{ $data->descKategori }}" required autofocus>

                                @error('descKategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
