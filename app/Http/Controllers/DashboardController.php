<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Business;
use Auth;
use DB;

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
        if(Auth::user()->role == 'admin_super'){
            $member = DB::table('members')->count();
        } else {
            $member = Member::where('input_by','admin_bip')->count();   
        }
        
        return view('pages/dashboard',[
          'sidebar' => 'dashboard',
          'jml_bisnis' => Business::count(),
          'jml_anggota' => $member,
          'jml_pendataan' => Member::where('level',1)->count(),
          'jml_draft' => Member::where('level',2)->count(),
          'jml_karantina' => Member::where('level',3)->count(),
          'jml_aktif' => Member::where('level',4)->count()
        ]);
    }
}
