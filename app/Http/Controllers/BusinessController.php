<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Anggota;
use App\Bisnis;
use App\Activity;

class BusinessController extends Controller
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
        return view('pages/profilebusiness',[
          'sidebar' => 'bipprofilebusiness'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/addprofilebusiness',[
          'sidebar' => 'bipprofilebusiness'
        ]);
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
          'lokasi' => $request['lokasi'],
          'pendapatan' => $request['pendapatan'],
          'penjelasan' => $request['penjelasan'],
        ];
        Bisnis::create($data);
        $bisnis = Bisnis::orderBy('id','desc')->first();
        for ($i=0; $i < count($request['anggota']); $i++) {
          $data=[
            'nama' => $request['anggota'][$i]['anggota'],
            'angkatan' => $request['anggota'][$i]['angkatan'],
            'instansi' => $request['anggota'][$i]['instansi'],
            'businesses_id' => $bisnis->id
          ];
          Anggota::create($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userdata()
    {
      return view('pages/userdatabip',[
        'sidebar' => 'bipuserdata'
      ]);
    }

    public function apiBisnis()
    {
      $bisnis = Bisnis::all();

      return DataTables::of($bisnis)
        ->addColumn('aksi',function($bisnis) {
          return '<a onclick="info('.$bisnis->id.')" class="btn btn-icon-only blue"><i class="fa fa-info"></i> </a>'.' '.
          '<a onclick="detail('.$bisnis->id.')" class="btn btn-icon-only default"><i class="fa fa-gear"></i></a>'.' '.
          '<a onclick="delete('.$bisnis->id.')" class="btn btn-icon-only red"><i class="fa fa-times"></i> </a>';
      })->escapeColumns([])->make(true);
    }

    public function detail($id)
    {
      $anggota = DB::table('bisnis')
                ->leftjoin('anggotas','anggotas.businesses_id','=','bisnis.id')
                ->select('anggotas.nama','anggotas.angkatan')
                ->where('bisnis.id', $id)
                ->get();
      $info = DB::table('bisnis')
              ->where('id',$id)->get();
      $act = DB::table('bisnis')
                ->leftjoin('activities','activities.businesses_id','=','bisnis.id')
                ->select('activities.*')
                ->where('bisnis.id', $id)
                ->orderBy("activities.tanggal")
                ->get();
      return view('pages/detail',[
        'sidebar' => 'bipprofilebusiness',
        'info' => $info,
        'anggota' => $anggota,
        'activities' => $act
      ]);
    }

    public function storeActivity(Request $request)
    {
      $data = [
        'judul' => $request['judul'],
        'tanggal' => date('Y-m-d H:i:s', strtotime($request['tanggal'])),
        'isi' => $request['isi'],
        'businesses_id' => $request['bisnisId'],
        'penulis' => $request['penulis']
      ];
      Activity::create($data);
      // echo $data["penulis"];
      // return $data;
    }
}
