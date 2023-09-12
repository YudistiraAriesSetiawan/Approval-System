<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function store(Request $request){
        
        Pengajuan::create([
            'nama' => $request->nama,
            'status' => 'proses'
        ]);

        return redirect()->back();
        
    }

    public function updateToApprove($id){

        $pengajuan = Pengajuan::find($id);

        $pengajuan->status = 'disetujui';

        $pengajuan->save();

        return redirect()->back();
    }

    public function updateToReject($id)
    {

        $pengajuan = Pengajuan::find($id);

        $pengajuan->status = 'ditolak';

        $pengajuan->save();

        return redirect()->back();
    }

    public function destroy($id){

        $pengajuan = Pengajuan::find($id);

        $pengajuan->delete();

        return redirect()->back();
    }
}
