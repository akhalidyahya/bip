<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembinaan;
use App\Bisnis;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/dashboard',[
          'sidebar' => 'dashboard',
          'jml_bisnis' => Bisnis::count(),
          'jml_anggota' => Pembinaan::count(),
          'jml_pendataan' => Pembinaan::where('status',1)->count(),
          'jml_draft' => Pembinaan::where('status',2)->count(),
          'jml_karantina' => Pembinaan::where('status',3)->count(),
          'jml_aktif' => Pembinaan::where('status',4)->count()
        ]);
    }
}
