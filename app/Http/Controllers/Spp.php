<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Http\Request;
use Excel;
use App\Exports\SppExport;

class Spp extends Controller
{
    public function index()
    {
        $pembayaran = SppModel::all();
        $data = [
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => $pembayaran
        ];
        return view ('pembayaran.index',$data);
    }

    public function save (Request $request)
    {
        SppModel::create($request->except(['_token','simpan']));
        return redirect()->to(url('pembayaran'))->with('success', 'Data Berhasil Di Tambah');
    }

    public function delete($id)
    {
        SppModel::destroy($id);
        return redirect ()->to(url('pembayaran'))->with('success','Data berhasil di hapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit data Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => SppModel::find($id)
        ];
        return redirect ()->to(url('pembayaran'))->with('success','Data berhasil di edit');
    }

    public function update(Request $request, $id)
    {
        $pembayaran = SppModel::find($id);
        $pembayaran ->update($request->except(['_token', '_method']));

        return redirect()->to(url('pembayaran'))->with('success', 'Data berhasil di edit');
    }

    public function exportExcel()
    {
        return Excel::download(new SppExport, 'spp-excel.xlsx');
    }
}
