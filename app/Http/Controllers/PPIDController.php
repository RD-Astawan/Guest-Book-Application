<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PPID;
use App\Models\buku_tamu;
use App\Models\tamu;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class PPIDController extends Controller
{
    
    public function v_data_kunjungan(){
        $data = buku_tamu::all();
        return view('PPID.v_data_kunjungan', compact('data'));
    }

    public function v_add_data_kunjungan(){
        return view('PPID.v_add_data_kunjungan');
    }
    
    public function store_data_kunjungan(Request $request){
        $this->buku_tamu = new buku_tamu();
        $request->validate([
            'nomor'   => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'asal_instansi' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'tujuan' => 'required',
            'tingkat_kepuasan' => 'required',
        ]);
        buku_tamu::create($request->all());

        Alert::success('Berhasil', 'Data Kunjungan berhasil ditambahkan');
        return redirect()->route('data_kunjungan');
    }

    public function edit_data_kunjungan($id)
    {
        $data = buku_tamu::find($id);
        $id_petugas = PPID::all();
        return view('PPID.v_edit_data_kunjungan', compact('data','id_petugas'));
    }

    public function update_data_kunjungan(Request $request, $id)
    {
        $buku_tamu = buku_tamu::find($id);
        $request->validate([
            'nomor'   => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'asal_instansi' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'tujuan' => 'required',
            'tingkat_kepuasan' => 'required',
            'id_petugas' => 'required',
        ]);
        $buku_tamu->update($request->all());

        Alert::success('Berhasil', 'Data Kunjungan berhasil dirubah');
        return redirect('data_kunjungan');
    }

    public function destroy_data_kunjungan($id)
    {
        $buku_tamu = buku_tamu::find($id);
        $buku_tamu->delete();

        Alert::success('Berhasil', 'Data Kunjungan berhasil dihapus');
        return redirect('data_kunjungan');
    }
    
    public function show_data_layanan(){
        $data = buku_tamu::all();
        return view('PPID.v_data_layanan', compact('data'));
    }

    public function edit_data_layanan($id)
    {
        $data = buku_tamu::find($id);
        return view('PPID.v_edit_data_layanan', compact('data'));
    }

    public function update_data_layanan(Request $request, $id)
    {
        $buku_tamu = buku_tamu::find($id);
        $request->validate([
            'nomor'   => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'asal_instansi' => 'required',
            'tujuan' => 'required',
            'status' => 'required',
        ]);
        $buku_tamu->update($request->all());

        Alert::success('Berhasil', 'Data Layanan berhasil dirubah');
        return redirect('data_layanan');
    }

    public function destroy_data_layanan($id)
    {
        $buku_tamu = buku_tamu::find($id);
        $buku_tamu->delete();

        Alert::success('Berhasil', 'Data layanan berhasil dihapus');
        return redirect('data_layanan');
    } 
    
    public function index_grafik(){
        $count_tamu_today = tamu::whereDate('created_at', Carbon::today())->count();
        $count_tamu_week  = tamu::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $count_tamu_month = tamu::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $count_all_tamu   = tamu::all()->count();
        
        $tercapai_month_1_until_4 = buku_tamu::where('status', '=', 'Tercapai')->whereBetween('tanggal', [Carbon::now()->startOfYear(), Carbon::now()->startOfYear()->addMonths(3)->endOfMonth()])->count();
        $tercapai_month_5_until_8 = buku_tamu::where('status', '=', 'Tercapai')->whereBetween('tanggal', [Carbon::now()->startOfYear()->addMonths(4), Carbon::now()->startOfYear()->addMonths(7)->endOfMonth()])->count();
        $tercapai_month_9_until_12 = buku_tamu::where('status', '=', 'Tercapai')->whereBetween('tanggal', [Carbon::now()->startOfYear()->addMonths(8), Carbon::now()->endOfYear()])->count();
        
        $tidak_tercapai_month_1_until_4 = buku_tamu::where('status', '=', 'Tidak tercapai')->whereBetween('tanggal', [Carbon::now()->startOfYear(), Carbon::now()->startOfYear()->addMonths(3)->endOfMonth()])->count();;
        $tidak_tercapai_month_5_until_8 = buku_tamu::where('status', '=', 'Tidak tercapai')->whereBetween('tanggal', [Carbon::now()->startOfYear()->addMonths(4), Carbon::now()->startOfYear()->addMonths(7)->endOfMonth()])->count();;
        $tidak_tercapai_month_9_until_12 = buku_tamu::where('status', '=', 'Tidak tercapai')->whereBetween('tanggal', [Carbon::now()->startOfYear()->addMonths(8), Carbon::now()->endOfYear()])->count();;
        
        $puas = buku_tamu::where('tingkat_kepuasan', '=', 'smile-icon.png')->count();
        $tidak_puas = buku_tamu::where('tingkat_kepuasan', '=', 'sad-icon.png')->count();

        return view('PPID.v_grafik', compact('puas','tidak_puas','tidak_tercapai_month_1_until_4','tidak_tercapai_month_5_until_8','tidak_tercapai_month_9_until_12','tercapai_month_1_until_4','tercapai_month_5_until_8','tercapai_month_9_until_12','count_tamu_today','count_tamu_week','count_tamu_month','count_all_tamu'));
    }


    public function index_lap_kunjungan(){
        $data = buku_tamu::all();
        $check = buku_tamu::where('verify_kunjungan', '=', 0)->count();
        //$check2 = buku_tamu::where('verify_kunjungan', '=', 0)->count();
        return view('PPID.v_laporan_kunjungan', compact('data','check'));
    }

    public function set_lap_kunjungan(){
        $data = buku_tamu::all();
        return view('PPID.v_set_lap_kunjungan');
    }

    public function cetak_lap_kunjungan(Request $request){
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $data_akhir = DB::table('buku_tamus')
                    ->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])
                    ->get();
        return view('PPID.v_cetak_lap_kunjungan', compact('data_akhir','tgl_awal','tgl_akhir'));
    }

    public function index_lap_layanan(){
        $data = buku_tamu::all();
        $check = buku_tamu::where('verify_layanan', '=', 0)->count();
        return view('PPID.v_laporan_layanan', compact('data','check'));
    }

    public function set_lap_layanan(){
        $data = buku_tamu::all();
        return view('PPID.v_set_lap_layanan');
    }

    public function cetak_lap_layanan(Request $request){
        $tgl_awal   = $request->tgl_awal;
        $tgl_akhir  = $request->tgl_akhir;
        $data_akhir = DB::table('buku_tamus')
                    ->whereBetween('tanggal', [$tgl_awal, $tgl_akhir])
                    ->get();
        return view('PPID.v_cetak_lap_layanan', compact('data_akhir','tgl_awal','tgl_akhir'));
    }
    
    public function edit_pengaturan(Request $request){
        $id   = auth()->id();
        $data = PPID::find($id); 
        return view('PPID.v_edit_pengaturan', compact('data'));
    }

    public function update_pengaturan(Request $request){
        $ppid   = Auth::user();
        // dd($ppid);
        $request->validate([
            'nip'   => 'required',
            'nama_petugas' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
            'username' => 'required',
            'foto' => 'mimes:jpg,png,jpeg|image|required',
        ]);
        if($request->hasFile('foto')){
            $path = $request->file('foto')->store('upload');
        }
        else{
            $path = '';
        }
        
            $ppid->nip          = $request->nip;
            $ppid->nama_petugas        = $request->nama_petugas;
            $ppid->jabatan         = $request->jabatan;
            $ppid->username = $request->username;
            $ppid->password      = $request->password;
            $ppid->foto      = $path;
        
        $ppid->save();
        
        Alert::success('Berhasil', 'Data Profil berhasil dirubah');
        return redirect('edit_pengaturan');
    }
    public function ppid_dashboard(){
        $id = Auth::guard('ppid')->user()->id_petugas;
        $data = PPID::find($id); 
        return view('PPID.v_beranda',compact('data'));
    }
}
