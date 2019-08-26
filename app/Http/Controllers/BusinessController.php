<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Member;
use App\Business;
use App\Activity;

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
        Business::create($data);
        $Business = Business::orderBy('id','desc')->first();
        for ($i=0; $i < count($request['anggota']); $i++) {
          $data=[
            'nama' => $request['anggota'][$i]['anggota'],
            'angkatan' => $request['anggota'][$i]['angkatan'],
            'kelamin' => $request['anggota'][$i]['kelamin'],
            'instansi' => $request['anggota'][$i]['instansi'],
            'email' => $request['anggota'][$i]['email'],
            'no_telp' => $request['anggota'][$i]['phone'],
            'level' => 1,
            'event_id' => 'bip',
            'businesses_id' => $Business->id,
            'input_by' => 'admin_bip'
          ];
          Member::create($data);
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
      $info = DB::table('Business')->where('id',$id)->get();
      return view('pages/editprofilebusiness',[
        'info'=> $info,
        'sidebar'=> 'bipprofilebusiness'
      ]);
    }

    public function anggota($id)
    {
      $anggota = DB::table('members')->where('businesses_id',$id)->get();
      return view('pages/editanggotabusiness',[
        'business' => Business::find($id),
        'anggota'=> $anggota,
        'all_anggota' => Member::where('input_by','admin_bip')->get(),
        'sidebar'=> 'bipprofilebusiness'
      ]);
    }

    public function removeAnggota($id) {
      $anggota = Member::find($id);
      $data = [
        'businesses_id' => ''
      ];
      $anggota->update($data);
    }

    public function tambahAnggota($id,$Business) {
      $anggota = Member::find($id);
      $data = [
        'businesses_id' => $Business
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
        'level' => 1,
        'event_id' => 'bip',
        'businesses_id' => $request['kelompok'],
        'input_by' => 'admin_bip'
      ];
      Member::create($data);
      $Member = Member::orderBy('id','desc')->first();
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
        'level' => 1,
        'event_id' => 'makeit',
        'businesses_id' => $request['kelompok'],
        'input_by' => 'admin_bip'
      ];
      Member::create($data);
      // return redirect('bip/userdata');
    }

    function updateAnggota(Request $request){
      $anggota = Member::find($request['id']);
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
        'level' => 1,
        'event_id' => 'bip',
        'businesses_id' => $request['kelompok'],
        'input_by' => 'admin_bip'
      ];
      $anggota->update($data);
      return redirect('bip/userdata');
    }

    function destroyAnggota(Request $request, $id){
      Member::destroy($id);
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
        $Business = Business::find($id);
        $data = [
          'nama' => $request->nama,
          'lokasi' => $request->lokasi,
          'pendapatan' => $request->pendapatan,
          'penjelasan' => $request->penjelasan,
          'batch' => $request->batch
        ];
        $Business->update($data);
        return redirect('bip/profiles/'.$Business->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Business::destroy($id);
    }

    public function userdata()
    {
      return view('pages/userdatabip',[
        'sidebar' => 'bipuserdata',
        'business' => Business::all()
      ]);
    }

    public function apiBusiness()
    {
      $Business = Business::all();

      return DataTables::of($Business)
        ->addColumn('aksi',function($Business) {
          return '<a onclick="info('.$Business->id.')" class="btn btn-icon-only blue"><i class="fa fa-info"></i> </a>'.' '.
          // '<a onclick="detail('.$Business->id.')" class="btn btn-icon-only default"><i class="fa fa-gear"></i></a>'.' '.
          '<a onclick="deleteData('.$Business->id.')" class="btn btn-icon-only red"><i class="fa fa-times"></i> </a>';
      })->escapeColumns([])->make(true);
    }

    public function detail($id)
    {
      $anggota = DB::table('businesses')
                ->leftjoin('members','members.businesses_id','=','businesses.id')
                ->select('members.nama','members.angkatan')
                ->where('businesses.id', $id)
                ->get();
      $info = DB::table('businesses')
              ->where('id',$id)->get();
      $act = DB::table('businesses')
                ->leftjoin('activities','activities.businesses_id','=','businesses.id')
                ->select('activities.*')
                ->where('businesses.id', $id)
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
      $act = DB::table('business')
                ->leftjoin('activities','activities.businesses_id','=','businesses.id')
                ->select('activities.*')
                ->where('businesses.id', $id)
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
        'businesses_id' => $request['BusinessId'],
        'penulis' => $request['penulis']
      ];
      Activity::create($data);
      // echo $data["penulis"];
      // return $data;
    }

    public function export(){
      $data = Business::all();

      $table = array_map( function($data){
          return (array) $data;
      },$data->toArray());
      return Excel::create('List Kelompok Business',function($excel) use ($table){
        $excel->sheet('sheet1',function($sheet) use($table){
          $sheet->fromArray($table);
        });
      })->download('csv');
    }

    public function deleteActivity($id){
      Activity::destroy($id);
    }

    public function apiAnggotaBIP($Business)
    {
      $anggota = Member::where('input_by','admin_bip')->where('businesses_id','!=',$Business)->get();

      return DataTables::of($anggota)
        ->addColumn('aksi',function($anggota) {
          return '<a href="javascript:;" onclick="tambah('.$anggota->id.');" class="font-green"><i class="fa fa-caret-left"></i> Tambah</a>';
      })->escapeColumns([])->make(true);
    }

    public function apiAnggotaKelompok($id)
    {
      $anggota = Member::where('businesses_id',$id)->get();

      return DataTables::of($anggota)
        ->addColumn('aksi',function($anggota) {
          return '<a href="javascript:;" onclick="hapus('.$anggota->id.');" class="font-red"><i class="fa fa-times"></i> Remove</a>';
      })->escapeColumns([])->make(true);
    }
}
