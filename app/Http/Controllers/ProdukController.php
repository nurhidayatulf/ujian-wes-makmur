<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data produk yang ada pada database
        $data = Produk::all();
        
        return view('produk.index_produk', compact ('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan submit oleh user kepada halaman create produk
        $data = Produk::all();
        
        return view('produk.create_produk', compact ('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan data produk yang telah ditambahkan oleh user di halaman create produk
        // dd($request);
        $validator = $request->validate([
            'namaProduk' => 'required',
            'foto' => 'required',
            'harga' => 'required',
            'descProduk' => 'required',
        ]);
        $validator['foto'] = Storage::put('img', $request->file('foto'));
        // dd($validator);
        Produk::create($validator);
        
        return redirect('index_produk')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan submit oleh user kepada halaman edit produk
        $data = Produk::findOrFail($id);

        return view('produk.edit_produk', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //menyimpan data yang telah diupdate oleh user di halaman edit produk
        $data = Produk::find($id);
        $validator = $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required',
            'descProduk' => 'required',
        ]);
        
        //fungsi agar data berupa foto tidak berubah jika tidak ada update data
        try {
            $validator['foto'] = Storage::put('img', $request->file('foto'));
            $data->update($validator);
        } catch (\Throwable $th) {
            $validator['foto'] = $data->foto;
            $data->update($validator);
        }
        return redirect('index_produk')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data pada tabel di database ketika dihapus oleh user
        $data = Produk::findOrFail($id);
        $data->delete();

        return redirect('index_produk')->with('success', 'Data Berhasil Dihapus');
    }
}