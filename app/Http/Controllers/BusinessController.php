<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Anggota;
use App\Pembinaan;
use App\Bisnis;
use App\Activity;
use App\Tag;

use Excel;
// use DB;

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
            'kelamin' => $request['anggota'][$i]['kelamin'],
            'instansi' => $request['anggota'][$i]['instansi'],
            'email' => $request['anggota'][$i]['email'],
            'no_telp' => $request['anggota'][$i]['phone'],
            'status' => 1,
            'kolam' => 'bip',
            'businesses_id' => $bisnis->id,
            'input' => 'bip'
          ];
          Pembinaan::create($data);
        }

        return redirect('bip/profiles');
        // return $data;
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
      $info = DB::table('bisnis')->where('id',$id)->get();
      return view('pages/editprofilebusiness',[
        'info'=> $info,
        'sidebar'=> 'bipprofilebusiness'
      ]);
    }

    public function anggota($id)
    {
      $anggota = DB::table('pembinaans')->where('businesses_id',$id)->get();
      return view('pages/editanggotabusiness',[
        'bisnis' => Bisnis::find($id),
        'anggota'=> $anggota,
        'all_anggota' => Pembinaan::where('input','bip')->get(),
        'sidebar'=> 'bipprofilebusiness'
      ]);
    }

    public function removeAnggota($id) {
      $anggota = Pembinaan::find($id);
      $data = [
        'businesses_id' => ''
      ];
      $anggota->update($data);
    }

    public function tambahAnggota($id,$bisnis) {
      $anggota = Pembinaan::find($id);
      $data = [
        'businesses_id' => $bisnis
      ];
      $anggota->update($data);
    }

    function simpanAnggota(Request $request){
      $data=[
        'nama' => $request['nama'],
        'angkatan' => $request['angkatan'],
        'jurusan' => $request['jurusan'],
        'umur' => $request['umur'],
        'kelas' => $request['kelas'],
        'kelamin' => $request['kelamin'],
        'instansi' => $request['instansi'],
        'email' => $request['email'],
        'no_telp' => $request['no_telp'],
        'status' => 1,
        'kolam' => 'bip',
        'businesses_id' => $request['kelompok'],
        'input' => 'bip'
      ];
      Pembinaan::create($data);
      $pembinaan = Pembinaan::orderBy('id','desc')->first();
      Tag::create([
        'id_pembinaan' => $pembinaan->id,
        'tag' => 'bip'
      ]);
      // return redirect('bip/userdata');
    }

    function simpanAnggotaMakeit(Request $request){
      $data=[
        'nama' => $request['nama'],
        'angkatan' => $request['angkatan'],
        'jurusan' => $request['jurusan'],
        'umur' => $request['umur'],
        'kelas' => $request['kelas'],
        'kelamin' => $request['kelamin'],
        'instansi' => $request['instansi'],
        'email' => $request['email'],
        'no_telp' => $request['no_telp'],
        'status' => 1,
        'kolam' => 'bip',
        'businesses_id' => $request['kelompok'],
        'input' => 'bip'
      ];
      Pembinaan::create($data);
      $pembinaan = Pembinaan::orderBy('id','desc')->first();
      Tag::create([
        'id_pembinaan' => $pembinaan->id,
        'tag' => 'makeit'
      ]);
      // return redirect('bip/userdata');
    }

    function updateAnggota(Request $request){
      $anggota = Pembinaan::find($request['id']);
      $data=[
        'nama' => $request['nama'],
        'angkatan' => $request['angkatan'],
        'jurusan' => $request['jurusan'],
        'umur' => $request['umur'],
        'kelas' => $request['kelas'],
        'kelamin' => $request['kelamin'],
        'instansi' => $request['instansi'],
        'email' => $request['email'],
        'no_telp' => $request['no_telp'],
        'status' => 1,
        'kolam' => 'bip',
        'businesses_id' => $request['kelompok'],
        'input' => 'bip'
      ];
      $anggota->update($data);
      return redirect('bip/userdata');
    }

    function destroyAnggota(Request $request, $id){
      Pembinaan::destroy($id);
      return redirect('bip/userdata');
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
        $bisnis = Bisnis::find($id);
        $data = [
          'nama' => $request->nama,
          'lokasi' => $request->lokasi,
          'pendapatan' => $request->pendapatan,
          'penjelasan' => $request->penjelasan,
          'batch' => $request->batch
        ];
        $bisnis->update($data);
        return redirect('bip/profiles/'.$bisnis->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bisnis::destroy($id);
    }

    public function userdata()
    {
      return view('pages/userdatabip',[
        'sidebar' => 'bipuserdata',
        'bisnis' => Bisnis::all()
      ]);
    }

    public function apiBisnis()
    {
      $bisnis = Bisnis::all();

      return DataTables::of($bisnis)
        ->addColumn('aksi',function($bisnis) {
          return '<a onclick="info('.$bisnis->id.')" class="btn btn-icon-only blue"><i class="fa fa-info"></i> </a>'.' '.
          // '<a onclick="detail('.$bisnis->id.')" class="btn btn-icon-only default"><i class="fa fa-gear"></i></a>'.' '.
          '<a onclick="deleteData('.$bisnis->id.')" class="btn btn-icon-only red"><i class="fa fa-times"></i> </a>';
      })->escapeColumns([])->make(true);
    }

    public function detail($id)
    {
      $anggota = DB::table('bisnis')
                ->leftjoin('pembinaans','pembinaans.businesses_id','=','bisnis.id')
                ->select('pembinaans.nama','pembinaans.angkatan')
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

    public function test($id){
      $act = DB::table('bisnis')
                ->leftjoin('activities','activities.businesses_id','=','bisnis.id')
                ->select('activities.*')
                ->where('bisnis.id', $id)
                ->orderBy("activities.tanggal")
                ->get();
      return $act[0]->judul;
    }

    public function storeActivity(Request $request)
    {
      $data = [
        'judul' => $request['judul'],
        'tanggal' => date('Y-m-d H:i:s', strtotime($request['tanggal'])),
        'isi' => $request['isi'],
        'pendapatan' => $request['pendapatan'],
        'businesses_id' => $request['bisnisId'],
        'penulis' => $request['penulis']
      ];
      Activity::create($data);
      // echo $data["penulis"];
      // return $data;
    }

    public function export(){
      $data = Bisnis::all();

      $table = array_map( function($data){
          return (array) $data;
      },$data->toArray());
      return Excel::create('List Kelompok Bisnis',function($excel) use ($table){
        $excel->sheet('sheet1',function($sheet) use($table){
          $sheet->fromArray($table);
        });
      })->download('csv');
    }

    public function deleteActivity($id){
      Activity::destroy($id);
    }

    public function apiAnggotaBIP($bisnis)
    {
      $anggota = Pembinaan::where('input','bip')->where('businesses_id','!=',$bisnis)->get();

      return DataTables::of($anggota)
        ->addColumn('aksi',function($anggota) {
          return '<a href="javascript:;" onclick="tambah('.$anggota->id.');" class="font-green"><i class="fa fa-caret-left"></i> Tambah</a>';
      })->escapeColumns([])->make(true);
    }

    public function apiAnggotaKelompok($id)
    {
      $anggota = Pembinaan::where('businesses_id',$id)->get();

      return DataTables::of($anggota)
        ->addColumn('aksi',function($anggota) {
          return '<a href="javascript:;" onclick="hapus('.$anggota->id.');" class="font-red"><i class="fa fa-times"></i> Remove</a>';
      })->escapeColumns([])->make(true);
    }
}
