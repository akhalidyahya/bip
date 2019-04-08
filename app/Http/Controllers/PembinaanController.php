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
            'status' => $request['status']
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
    
    public function apipembinaan()
    {
        $pembinaan = Pembinaan::all();
        return DataTables::of($pembinaan)
        ->addColumn('aksi', function($pembinaan){
            return '<a onclick="editData('.$pembinaan->id.')" class="btn btn-info btn-xs">Edit</a>'.''.
            '<a onclick="deleteData('.$pembinaan->id.')"class="btn btn-danger btn-xs">Delete</a>';
        })->escapeColumns([])->make(true);
    }

    public function draft()
    {
    	/**$pembinaan = DB::table('pembinaans')
    				->select('pembinaans.nama', 'pembinaans.kelas', 'pembinaans.jurusan', 'pembinaans.no_telp', 'pembinaans.kelompok', 'pembinaans.pic', 'pembinaans.interest', 'pembinaans.tindakan')
    				->where('pembinaans.id', $id)
    				->get();
    	$info = DB::table('pembinaans')
              ->where('id', $id)->get();*/
    	return view('pages/draftuserdata',[
          'sidebar' => 'draftuserdata',
          /*'info' => $info,
          'pembinaan' => $pembinaan*/
        ]);
    }

    public function apidraft()
    {
    	$pembinaan = DB::table('pembinaans')
    				->select('pembinaans.nama', 'pembinaans.kelas', 'pembinaans.jurusan', 'pembinaans.no_telp', 'pembinaans.kelompok', 'pembinaans.pic', 'pembinaans.interest', 'pembinaans.tindakan')
    				->where('pembinaans.status', $status)
    				->get();
    	$info = DB::table('pembinaans')
              ->where('status', $status)->get();
          return view('pages/draftuserdata',[
          'sidebar' => 'draftuserdata',
          'info' => $info,
          'pembinaan' => $pembinaan
      ]);
    }

    public function karantina()
    {
    	/**$pembinaan = DB::table('pembinaans')
    				->select('pembinaans.nama', 'pembinaans.jurusan', 'pembinaans.no_telp', 'pembinaans.pic', 'pembinaans.murabbi', 'pembinaans.liqo', 'pembinaans.bisnis', 'pembinaans.pemahaman', 'pembinaans.keterlibatan')
    				->where('pembinaans.id', $id)
    				->get();
    	$info = DB::table('pembinaans')
              ->where('id', $id)->get();**/
    	return view('pages/karantinauserdata',[
          'sidebar' => 'karantinauserdata',
          /**'info' => $info,
          'pembinaan' => $pembinaan*/
        ]);
    }

    public function aktif()
    {
    	/**$pembinaan = DB::table('pembinaans')
    				->select('pembinaans.nama', 'pembinaans.jurusan', 'pembinaans.no_telp', 'pembinaans.pic', 'pembinaans.murabbi', 'pembinaans.keterlibatan', 'pembinaans.penugasan', 'pembinaans.proyeksi')
    				->where('pembinaans.id', $id)
    				->get();
    	$info = DB::table('pembinaans')
              ->where('id', $id)->get();*/
    	return view('pages/aktifuserdata',[
          'sidebar' => 'aktifuserdata'
          /*'info' => $info,
          'pembinaan' => $pembinaan*/
        ]);
    }
}   