@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('rekomendasi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <h3>Rekomendasi Jamu</h3>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Nama Jamu</label>
                    <input type="text" class="form-control" name="nama">
                </div> --}}
                {{-- <div class="mb-3">
                    <label class="form-label">Khasiat</label>
                    <input type="number" class="form-control" name="khasiat">
                </div> --}}
                <div class="mb-3">
                    <label class="form-label">Keluhan</label>
                    <input type="number" class="form-control" name="keluhan">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <input type="text" class="form-control" name="tahunLahir">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Saran Penggunaan</label>
                    <input type="number" class="form-control" name="saran">
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            @isset($data)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nama Jamu</th>
                        <th scope="col">Khasiat</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Saran Penggunaan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data['nama']}}</td>
                    </tr>
                    <tr>
                        <th>Khasiat</th>
                        <td>{{ $data['khasiat']}}</td>
                    </tr>
                    <tr>
                        <th>Keluhan</th>
                        <td>{{ $data['keluhan']}}</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>{{ $data['umur']}}</td>
                    </tr>
                    <tr>
                        <th>Saran Penggunaan</th>
                        <td>{{ $data['saran']}}</td>
                    </tr>
                </tbody>
            </table>
            @endisset
        </div>
    </div>
</div>
@endsection