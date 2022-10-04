<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPID;
use App\Models\KSPP;
use App\Models\buku_tamu;
use App\Models\tamu;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class KSPPController extends Controller
{
    public function kspp_dashboard(){
        $id = Auth::guard('kspp')->user()->id;
        $data = KSPP::find($id); 
        return view('KSPP.v_beranda',compact('data'));
    }

    public function index_lap_kunjungan(){
        $data = buku_tamu::all();
        $check = buku_tamu::where('verify_kunjungan', '=', 1)->count();
        $check2 = buku_tamu::where('verify_kunjungan', '=', 0)->count();
        $check3 = buku_tamu::all()->count();
        return view('KSPP.v_lap_kunjungan', compact('check2','data','check','check3'));
    }

    public function update_konfirm_kunjungan($kode){
        $value = $kode;
        $konfirm = DB::table('buku_tamus')->where('verify_kunjungan', '=', 0)->update(array('verify_kunjungan' => 1));
        // Response
        return response()->json([
            'success' => true,
            'message' => 'Laporan Kunjungan Berhasil di Verifikasi',
        ]);
    }

    public function update_konfirm_kunjungan2($kode){
        $value = $kode;
        $konfirm = DB::table('buku_tamus')->where('verify_kunjungan', '=', 1)->update(array('verify_kunjungan' => 0));
        // Response
        return response()->json([
            'success' => true,
            'message' => 'Laporan Kunjungan Batal di Verifikasi',
        ]);
    }

    public function index_lap_layanan(){
        $data = buku_tamu::all();
        $check = buku_tamu::where('verify_layanan', '=', 1)->count();
        $check2 = buku_tamu::where('verify_layanan', '=', 0)->count();
        $check3 = buku_tamu::all()->count();
        return view('KSPP.v_lap_layanan', compact('check2','data','check','check3'));
    }

    public function update_konfirm_layanan($kode){
        $value = $kode;
        $konfirm = DB::table('buku_tamus')->where('verify_layanan', '=', 0)->update(array('verify_layanan' => 1));
        // Response
        return response()->json([
            'success' => true,
            'message' => 'Laporan Layanan Berhasil di Verifikasi',
        ]);
    }

    public function update_konfirm_layanan2($kode){
        $value = $kode;
        $konfirm = DB::table('buku_tamus')->where('verify_layanan', '=', 1)->update(array('verify_layanan' => 0));
        // Response
        return response()->json([
            'success' => true,
            'message' => 'Laporan Layanan Batal di Verifikasi',
        ]);
    }

    public function edit_pengaturan_kspp(Request $request){
        $id   = auth()->id();
        $data = KSPP::find($id); 
        return view('KSPP.v_edit_pengaturan_kspp', compact('data'));
    }

    public function update_pengaturan_kspp(Request $request){
        $ppid   = Auth::user();
        $request->validate([
            'nip'   => 'required',
            'nama_kabag' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|image|required',
        ]);
        if($request->hasFile('foto')){
            $path = $request->file('foto')->store('upload');
        }
        else{
            $path = '';
        }
        
            $ppid->nip              = $request->nip;
            $ppid->nama_kabag       = $request->nama_kabag;
            $ppid->jabatan          = $request->jabatan;
            $ppid->username         = $request->username;
            $ppid->password         = $request->password;
            $ppid->foto             = $path;
        
            $ppid->update();
        
        Alert::success('Berhasil', 'Data Profil berhasil dirubah');
        return redirect('edit_pengaturan_kspp');
    }
}
