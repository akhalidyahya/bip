<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Pembinaan;

class PembinaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/mentahuserdata',[
          'sidebar' => 'mentahuserdata'
        ]);
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
         $data = [
            'nama' => $request['nama'],
            'kelamin' => $request['kelamin'],
            'umur' => $request['umur'],
            'angkatan' => $request['angkatan'],
            'jurusan' => $request['jurusan'],
            'kelas' => $request['kelas'],
            'email' => $request['email'],
            'no_telp' => $request['no_telp'],
            'instansi' => $request['instansi'],
            'kelompok' => $request['kelompok'],
            'pic' => $request['pic'],
            'interest' => $request['interest'],
            'tindakan' => $request['tindakan'],
            'murabbi' => $request['murabbi'],
            'liqo' => $request['liqo'],
            'bisnis' => $request['bisnis'],
            'pemahaman' => $request['pemahaman'],
            'keterlibatan' => $request['keterlibatan'],
            'penugasan' => $request['penugasan'],
            'proyeksi' => $request['proyeksi'],
            'status' => $request['status'],
            'kolam' => $request['kolam']
        ];

        
        Pembinaan::create($data);
        return redirect('pembinaan/datamentah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembinaan = Pembinaan::find($id);
        return $pembinaan;
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
        $pembinaan = Pembinaan::find($id);
        $pembinaan->nama = $request['nama'];
        $pembinaan->kelamin = $request['kelamin'];
        $pembinaan->umur = $request['umur'];
        $pembinaan->angkatan = $request['angkatan'];
        $pembinaan->jurusan = $request['jurusan'];
        $pembinaan->kelas = $request['kelas'];
        $pembinaan->email = $request['email'];
        $pembinaan->no_telp = $request['no_telp'];
        $pembinaan->instansi = $request['instansi'];
        $pembinaan->kelompok = $request['kelompok'];
        $pembinaan->pic = $request['pic'];
        $pembinaan->interest = $request['interest'];
        $pembinaan->tindakan = $request['tindakan'];
        $pembinaan->murabbi = $request['murabbi'];
        $pembinaan->liqo = $request['liqo'];
        $pembinaan->bisnis = $request['bisnis'];
        $pembinaan->pemahaman = $request['pemahaman'];
        $pembinaan->keterlibatan = $request['keterlibatan'];
        $pembinaan->penugasan = $request['penugasan'];
        $pembinaan->proyeksi = $request['proyeksi'];
        $pembinaan->status = $request['status'];
        $pembinaan->kolam = $request['kolam'];
        $pembinaan->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembinaan::destroy($id);
        
    }

    //DRAFT
    public function pindahDraft($id){
        $pembinaan = DB::table('pembinaans')->where('id',$id)->update(['status'=>'2']);
        return redirect('pembinaan/draft');
    }

    public function apiDraft(){
      $pembinaan = DB::table('pembinaans')->where('status','2')->orderBy('created_at','asc');

      return DataTables::of($pembinaan)
            ->addColumn('aksi',function($pembinaan) {
              return '
            <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>'
          ;
          })->escapeColumns([])->make(true);
    }
    
    //KARANTINA
    public function pindahKarantina($id){
      $pembinaan = DB::table('pembinaans')->where('id',$id)->update(['status'=>'3']);
        return redirect('pembinaan/karantina');
    }

    public function apiKarantina(){
      $pembinaan = DB::table('pembinaans')->where('status','3')->orderBy('created_at','asc');

      return DataTables::of($pembinaan)
            ->addColumn('aksi',function($pembinaan) {
              return '
            <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>'
          ;
          })->escapeColumns([])->make(true);
    }

    //AKTIF
    public function pindahAktif($id){
      $pembinaan = DB::table('pembinaans')->where('id',$id)->update(['status'=>'4']);
        return redirect('pembinaan/aktif');
    }
    public function apiAktif(){
      $pembinaan = DB::table('pembinaans')->where('status','4')->orderBy('created_at','asc');

      return DataTables::of($pembinaan)
            ->addColumn('aksi',function($pembinaan) {
              return '
            <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>'
          ;
          })->escapeColumns([])->make(true);
    }


    public function apipembinaan()
    {
        $pembinaan = Pembinaan::all();
        return DataTables::of($pembinaan)
        ->addColumn('aksi', function($pembinaan){
            return '<a onclick="editData('.$pembinaan->id.')" class="btn btn-info btn-xs">Edit</a>'.''.
            '<a onclick="deleteData('.$pembinaan->id.')"class="btn btn-danger btn-xs">Delete</a>'.''.
            /*'<a onclick="prosesData('.$pembinaan->id.')"class="icon-arrow-right"> </a>'*/
            '<div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$pembinaan->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>';
        })->escapeColumns([])->make(true);
    }

    public function draft()
    {
    	
    	return view('pages/draftuserdata',[
          'sidebar' => 'draftuserdata'
        ]);
    }

    public function karantina()
    {
    	return view('pages/karantinauserdata',[
          'sidebar' => 'karantinauserdata'
        ]);
    }

    public function aktif()
    {

    	return view('pages/aktifuserdata',[
          'sidebar' => 'aktifuserdata'
        ]);
    }
}   