<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang = Gudang::all();
        return view('gudang.index', [
            'gudang' => $gudang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_nota' => 'required',
            'nama_supplier' => 'required',
            'tanggal_order' => 'required',
            'tanggal_diterima' => 'required',
            'nama_barang' => 'required',
            'quantity' => 'required',
        ]);
        $array = $request->only([
            'no_nota', 'nama_supplier', 'tanggal_order', 'tanggal_diterima', 'nama_barang', 'quantity'
        ]);
        $gudang = Gudang::create($array);
        return redirect()->route('gudang.index')
            ->with('success_message', 'Berhasil menambah data baru');
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
        $gudang = Gudang::find($id);
        if (!$gudang) return redirect()->route('gudang.index')
            ->with('error_message', 'Data dengan id' . $id . ' tidak ditemukan');
        return view('gudang.edit', [
            'gudang' => $gudang
        ]);
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
        $request->validate([
            'no_nota' => 'required',
            'nama_supplier' => 'required',
            'tanggal_order' => 'required',
            'tanggal_diterima' => 'required',
            'nama_barang' => 'required',
            'quantity' => 'required',
        ]);
        $gudang = Gudang::find($id);
        $gudang->no_nota = $request->no_nota;
        $gudang->nama_supplier = $request->nama_supplier;
        $gudang->tanggal_order = $request->tanggal_order;
        $gudang->tanggal_diterima = $request->tanggal_diterima;
        $gudang->nama_barang = $request->nama_barang;
        $gudang->quantity = $request->quantity;
        $gudang->save();
        return redirect()->route('gudang.index')
            ->with('success_message', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $gudang = Gudang::find($id);
            $gudang->delete();
            return redirect()->route('gudang.index')
                ->with('success_message', 'Berhasil menghapus data');
    }
}
