<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::orderBy('created_at', 'DESC')->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //validasi form
        $this->validate($request, [

            'nama_kategori' => 'required|string|max:30',
            'deskripsi' => 'nullable|max:50'
        ]);

        try {

            $kategori = Kategori::firstOrCreate([

                'nama_kategori' => $request->nama_kategori
            ], [
                'deskripsi' => $request->deskripsi
            ]);

            return redirect()->back()->with(['simpan', 'Kategori' . $kategori->nama_kategori.' Berhasil Disimpan']);
                
        } catch (\Exception $e) {
            
            return redirect()->back()->with(['error' => $e->getMessage() ]);
        }
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
            'nama_kategori' => 'required|string|max:30',
            'deskripsi' => 'nullable|string'
        ]);

        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'deskripsi' => $request->deskripsi
            ]);

            return redirect(route('kategori.index'))->with(['sukses' => 'Kategori: '. $kategori->nama_kategori. ' Berhasil Disimpan']);

        } catch (\Exception $e) {
            
            return redirect()->back()->with(['error' => $e->getMessage()]);
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
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with(['hapus' => 'Kategori: '.$kategori->nama_kategori.' Berhasil Dihapus']);
    }
}
