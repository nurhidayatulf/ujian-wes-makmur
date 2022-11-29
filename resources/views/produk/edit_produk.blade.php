@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Produk</div>

                <div class="card-body">
                    <form method="POST" action="/index_produk/{{ $data->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="namaProduk" class="col-md-4 col-form-label text-md-end">Nama Produk</label>
                            <div class="col-md-6">
                                <input id="namaProduk" type="text" class="form-control @error('namaProduk') is-invalid @enderror" name="namaProduk" value="{{ $data->namaProduk }}" required autofocus>
                                @error('namaProduk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-end">Foto</label>
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/'.$data->foto) }}" alt="" style="width: 153px;">
                                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ $data->foto }}" autofocus>
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="harga" class="col-md-4 col-form-label text-md-end">Harga</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $data->harga }}" required autofocus>

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="descProduk" class="col-md-4 col-form-label text-md-end">Deskripsi Produk</label>
                            <div class="col-md-6">
                                <input id="descProduk" type="text" class="form-control @error('descProduk') is-invalid @enderror" name="descProduk" value="{{ $data->descProduk }}" required autofocus>
                                @error('descProduk')
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