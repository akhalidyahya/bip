<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\MakeIt;

class MakeitController extends Controller
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
        return view('pages/userdatamakeit',[
          'sidebar' => 'makeituserdata'
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
            'email' => $request['email'],
            'instansi' => $request['instansi'],
            'no_telp' => $request['no_telp'],
            'instagram' => $request['instagram'],
            'facebook' => $request['facebook'],
            'twitter' => $request['twitter']
        ];
        
        MakeIt::create($data);
        return redirect('makeit');
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
        $makeit = MakeIt::find($id);
        return $makeit;
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
        $makeit = MakeIt::find($id);
        $makeit->nama = $request['nama'];
        $makeit->kelamin = $request['kelamin'];
        $makeit->umur = $request['umur'];
        $makeit->email = $request['email'];
        $makeit->instansi = $request['instansi'];
        $makeit->no_telp = $request['no_telp'];
        $makeit->instagram = $request['instagram'];
        $makeit->facebook = $request['facebook'];
        $makeit->twitter = $request['twitter'];
        $makeit->update();

        // return $makeit;
        // return Redirect::route('makeit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MakeIt::destroy($id);
    }
    
    public function apimakeit()
    {
        $makeit = Makeit::all();
        return DataTables::of($makeit)
        ->addColumn('aksi', function($makeit){
            return '<a onclick="editData('.$makeit->id.')" class="btn btn-info btn-xs">Edit</a>'.''.
            '<a onclick="deleteData('.$makeit->id.')"class="btn btn-danger btn-xs">Delete</a>';
        })->escapeColumns([])->make(true);
    }
}   

