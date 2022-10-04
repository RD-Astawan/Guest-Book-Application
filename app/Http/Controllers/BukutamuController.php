<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku_tamu;
use App\Models\tamu;
use App\Models\PPID;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class BukutamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $nama = $request->nama;
        $nomor = $request->nomor;
        $tanggal = $request->tanggal;
        $asal_instansi = $request->asal_instansi;
        $alamat = $request->alamat;
        $no_tlp = $request->no_tlp;
        $tujuan = $request->tujuan;
        $tingkat_kepuasan = $request->tingkat_kepuasan;
        //insert into invoice
        $tamu=array('no_tlp'=>$no_tlp,'nama'=>$nama,'asal_instansi'=>$asal_instansi,'alamat'=>$alamat, 'created_at'=>\Carbon\Carbon::now(), 'updated_at'=>\Carbon\Carbon::now());
        DB::table('tamus')->insert($tamu);
        $latest = tamu::latest()->first();
        $tlp = $latest->no_tlp;
        $buku=array('nomor'=>$nomor,'tanggal'=>$tanggal,'nama'=>$nama,'asal_instansi'=>$asal_instansi,'alamat'=>$alamat,'no_tlp'=>$tlp,'tujuan'=>$tujuan,'tingkat_kepuasan'=>$tingkat_kepuasan);
        DB::table('buku_tamus')->insert($buku);
        
        Alert::success('Berhasil', 'Data kunjungan berhasil ditambahkan');
        return redirect('/');
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
    }
}
