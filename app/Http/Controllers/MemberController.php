<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Member;
use Auth;
use Excel;
use App\Event;

class MemberController extends Controller
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
        if (Auth::user()->role !== 'admin_super') {
          return redirect('dashboard');
        }
        return view('pages/mentahuserdata',[
          'sidebar' => 'mentahuserdata',
          'event' => Event::all()
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
            'guru' => $request['guru'],
            'pertemuan' => $request['pertemuan'],
            // 'business' => $request['businesses'],
            'pemahaman' => $request['pemahaman'],
            'keterlibatan' => $request['keterlibatan'],
            'penugasan' => $request['penugasan'],
            'proyeksi' => $request['proyeksi'],
            'level' => $request['status'],
            'event' => $request['event'],
            'input' => 'admin_super'
        ];

        Member::create($data);
        return redirect('member/datamentah');
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
        $member = Member::find($id);
        return $member;
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
        $member = Member::find($id);
        $member->nama = $request['nama'];
        $member->kelamin = $request['kelamin'];
        $member->umur = $request['umur'];
        $member->angkatan = $request['angkatan'];
        $member->jurusan = $request['jurusan'];
        $member->kelas = $request['kelas'];
        $member->email = $request['email'];
        $member->no_telp = $request['no_telp'];
        $member->instansi = $request['instansi'];
        $member->kelompok = $request['kelompok'];
        $member->pic = $request['pic'];
        $member->interest = $request['interest'];
        $member->tindakan = $request['tindakan'];
        $member->guru = $request['guru'];
        $member->pertemuan = $request['pertemuan'];
        // $member->bisnis = $request['bisnis'];
        $member->pemahaman = $request['pemahaman'];
        $member->keterlibatan = $request['keterlibatan'];
        $member->penugasan = $request['penugasan'];
        $member->proyeksi = $request['proyeksi'];
        $member->level = $request['status'];
        $member->event = $request['event'];
        $member->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
    }

    //DRAFT
    public function pindahDraft($id){
        $member = DB::table('members')->where('id',$id)->update(['level'=>'2']);
        return redirect('member/draft');
    }

    public function apiDraft(){
      $member = DB::table('members')->where('level','2')->orderBy('created_at','asc');

      return DataTables::of($member)
            ->addColumn('aksi',function($member) {
              return '
            <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$member->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>'
          ;
          })->escapeColumns([])->make(true);
    }

    //KARANTINA
    public function pindahKarantina($id){
      $member = DB::table('members')->where('id',$id)->update(['level'=>'3']);
        return redirect('member/karantina');
    }

    public function apiKarantina(){
      $member = DB::table('members')->where('level','3')->orderBy('created_at','asc');

      return DataTables::of($member)
            ->addColumn('aksi',function($member) {
              return '
            <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$member->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>'
          ;
          })->escapeColumns([])->make(true);
    }

    //AKTIF
    public function pindahAktif($id){
      $member = DB::table('members')->where('id',$id)->update(['level'=>'4']);
      return redirect('member/aktif');
    }

    public function apiAktif(){
      $member = DB::table('members')->where('level','4')->orderBy('created_at','asc');

      return DataTables::of($member)
            ->addColumn('aksi',function($member) {
              return '
            <div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$member->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>'
          ;
          })->escapeColumns([])->make(true);
    }


    public function apimember()
    {
        if(Auth::user()->role !== 'admin_super') {
          $member = DB::table('members')
                            ->leftjoin('businesses','members.businesses_id','=','businesses.id')
                            // ->leftjoin('tags','members.id','=','tags.id_member')
                            ->select('members.*','businesses.nama as nama_bisnis')
                            ->where('input_by','admin_bip')
                            ->get();
          // $member = Member::where('input','bip');
        } else {
          $member = Member::all();
        }
        return DataTables::of($member)
        ->addColumn('aksi', function($member){
            return '<a onclick="editData('.$member->id.')" class="btn btn-info btn-xs">Edit</a>'.''.
            '<a onclick="deleteData('.$member->id.')"class="btn btn-danger btn-xs">Delete</a>'.''.
            /*'<a onclick="prosesData('.$member->id.')"class="icon-arrow-right"> </a>'*/
            '<div class="btn-group">
            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Pindah
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="pindah/'.$member->id.'/status-2"> Draft
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-3"> Karantina
                </a>
              </li>
              <li>
                <a href="pindah/'.$member->id.'/status-4"> Aktif
                </a>
              </li>
            </ul>
          </div>';
        })->addColumn('edit_bip',function($member){
          return '<a href="javascript:;" onclick="edit('.$member->id.')" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>';
        })->addColumn('delete_bip',function($member){
          return '<a href="'.route('userdata.bip.destroy',$member->id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>';
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

    public function export(){
      $data = DB::table('members')
                ->select('nama','kelamin','umur','angkatan','jurusan','kelas','no_telp','email','instansi','businesses_id')
                ->where('event_id','=','bip')
                ->orWhere('event_id','=','makeit')
                ->get();

      $table = array_map( function($data){
          return (array) $data;
      },$data->toArray());
      return Excel::create('List Kelompok Anggota Bisnis',function($excel) use ($table){
        $excel->sheet('sheet1',function($sheet) use($table){
          $sheet->fromArray($table);
        });
      })->download('csv');
    }
}
