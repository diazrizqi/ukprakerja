<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('tampilproduk', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::all();
        $kategori = Kategori::all();
        return view('tambahproduk', compact('post','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaproduk' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|string',
            'descproduk' => 'required|string',
            'post_id' => 'required|integer',
            'kategori_id' => 'required|integer',
        ]);
        
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $uploadedImage = $request->foto->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        
            $produkdata = [
                'namaproduk' => $request->namaproduk,
                'descproduk' => $request->descproduk,
                'harga' => $request->harga,
                'foto' => $imagePath,  // Simpan path file gambar, bukan hanya nama file
                'post_id' => $request->post_id,
                'kategori_id' => $request->kategori_id,
                // Pastikan ada field untuk harga (jika dibutuhkan), karena Anda menggunakan 'harga' => 'required|integer' di validasi
            ];
        
            Produk::create($produkdata);
        
            return redirect('produk')->with('success', 'Data Berhasil Diinput!');
        } else {
            // Handle case where 'foto' file is not uploaded
            return redirect()->back()->with('error', 'Gambar produk wajib diunggah.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::find($id);
        $post = Post::all();
        $kategori = Kategori::all();
        return view('editproduk', compact('data','post','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $imageName = '';
        if ($request->hasFile('file')) {
        $imageName = time() . '.' . $request->file->extension();
        $request->file->storeAs('public/images', $imageName);
        if ($produk->image) {
            Storage::delete('public/images/' . $produk->image);
        }
        } else {
        $imageName = $produk->image;
        }
        $produkdata = ['namaproduk' => $request->namaproduk,
        'category' => $request->category, 
        'descproduk' => $request->descproduk, 
        'harga' => $request->harga,
        'foto' => $imageName,
        'post_id' => $request->post_id, 
        'kategori_id' => $request->kategori_id];

        Produk::create($produkdata);
        return redirect('produk')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::find($id)->delete();
        return redirect('produk')->with('success', 'Data berhasil dihapus!');
    }
}
