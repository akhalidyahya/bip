<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembinaan;
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
          'jml_anggota' => pembinaan::count(),
          'jml_pendataan' => pembinaan::where('status',1)->count(),
          'jml_draft' => pembinaan::where('status',2)->count(),
          'jml_karantina' => pembinaan::where('status',3)->count(),
          'jml_aktif' => pembinaan::where('status',4)->count()
        ]);
    }
}
