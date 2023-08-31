<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Siswa extends Controller
{
    public function index()
    {
        $pembayaran = SppModel::all();
        $data = [
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => $pembayaran
        ];
        return view('siswa.index', $data);
    }
}
