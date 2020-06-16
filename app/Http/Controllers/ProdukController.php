<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
use File;
use Image;




class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = Produk::with('kategori')->orderBy('created_at', 'DESC')->paginate(10);

        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::orderBy('nama_kategori', 'ASC')->get();

        return view('produk.create', compact('kategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'kode_produk' => 'required|string|max:12|unique:produk',
            'nama_produk' => 'required|string|max:50',
            'deskripsi' => 'nullable|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try {

            $foto = null;

            if ($request->hasFile('foto')) {
                
                $foto = $this->savefile($request->nama_produk, $request->file('foto'));
                //variabel foto memanggil fungsi savefile untuk mengunggah fi;e (foto)


                $produk = Produk::create([

                    'kode_produk' => $request->kode_produk,
                    'nama_produk' => $request->nama_produk,
                    'deskripsi' => $request->deskripsi,
                    'stok' => $request->stok,
                    'harga' => $request->harga,
                    'kategori_id' => $request->kategori_id,
                    'foto' => $foto
                ]);

                return redirect(route('produk.index'))->with(['simpan' => 'Produk'.$produk->nama_produk.' Berhasil Disimpan']);
            }
            
        } catch (\Exception $e) {
            
            return redirect()->back()->with(['error' => $e->getMessage]);
        }
    }

    private function savefile($nama_produk, $foto){

        $image = str_slug($nama_produk) . time() . '.' . $foto->getClientOriginalExtension();
        $path = public_path('unggah/produk');

        if (!File::isDirectory($path)) {
            
            File::makeDirectory($path, 0777, true, true);
        }

       Image::make($foto)->save($path . '/' . $image);

        return $image;
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
        //
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::orderBy('nama_kategori', 'ASC')->get();

        return view('produk.edit', compact('produk', 'kategori'));
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
        //
        $this->validate($request, [

            'nama_produk' => 'required|string|max:50',
            'deskripsi' => 'nullable|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try {

            $produk = Produk::findOrFail($id);
            $foto = $produk->foto;

            if ($request->hasFile('foto')) {

                !empty($foto) ? 
                File::delete(public_path('unggah/produk/'.$foto))
                :null;

                $foto = $this->savefile($request->nama_produk, $request->file('foto')); 
                //variabel foto memanggil fungsi savefile untuk mengunggah fi;e (foto)
            }

            $produk->update([

                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
                'foto' => $foto
            ]);

            return redirect(route('produk.index'))->with(['ubah' => 'Data Produk '.$produk->nama_produk.' Berhasil Diperbarui']);
            
        } catch (\Exception $e) {
            
            return redirect()->back()->with(['error' => $e->getMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produk = Produk::findOrFail($id);
        $foto = $produk->foto;
        
        if (!empty($foto)) {
            
            File::delete(public_path('unggah/produk/'.$foto));
        }

        $produk->delete();

        return redirect()->back()->with(['hapus' => 'Data ' .$produk->nama_produk . 'Berhasil Dihapus']);
    }
}
