<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Level;
use App\Lokasi;
//use Illuminate\Routing\Controller;

class SekolahController extends BaseController
{
    public function index(){
        return Sekolah::all();
    }

    public function create(){
        $data = array(
            'sekolah'   => Sekolah::all(),
            'level'     => Level::all(),
            'lokasi'    => Lokasi::all()
        );

        return json_encode($data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'  => 'required',
            'parent'  => 'required',
            'status'  => 'required',
            'level'  => 'required',
            'alamat'  => 'required',
            'users'  => 'required',
            'telp'  => 'required',
            'daerah'  => 'required',
            'provinsi'  => 'required',
            'kabupaten'  => 'required',
            'kecamatan'  => 'required',
            'kelurahan'  => 'required',
        ]); 
        $sekolah   = new Sekolah;
        $sekolah->name  = $request->input('name');
        $sekolah->parent  = 0;
        $sekolah->status  = 0;
        $sekolah->level  = $request->input('level');
        $sekolah->alamat  = $request->input('alamat');
        $sekolah->users  = $request->input('users');
        $sekolah->telp  = $request->input('telp');
        $sekolah->daerah  = $request->input('daerah');
        $sekolah->provinsi  = $request->input('provinsi');
        $sekolah->kabupaten  = $request->input('kabupaten');
        $sekolah->kecamatan  = $request->input('kecamatan');
        $sekolah->kelurahan  = $request->input('kelurahan');
        $sekolah->save();
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name'  => 'required',
            'parent'  => 'required',
            'status'  => 'required',
            'level'  => 'required',
            'alamat'  => 'required',
            'users'  => 'required',
            'telp'  => 'required',
            'daerah'  => 'required',
            'provinsi'  => 'required',
            'kabupaten'  => 'required',
            'kecamatan'  => 'required',
            'kelurahan'  => 'required',
        ]); 
        $sekolah   = Sekolah::findOrFail($id);
        $sekolah->name  = $request->input('name');
        $sekolah->parent  = 0;
        $sekolah->status  = 0;
        $sekolah->level  = $request->input('level');
        $sekolah->alamat  = $request->input('alamat');
        $sekolah->users  = $request->input('users');
        $sekolah->telp  = $request->input('telp');
        $sekolah->daerah  = $request->input('daerah');
        $sekolah->provinsi  = $request->input('provinsi');
        $sekolah->kabupaten  = $request->input('kabupaten');
        $sekolah->kecamatan  = $request->input('kecamatan');
        $sekolah->kelurahan  = $request->input('kelurahan');
        $sekolah->save();
    }

    public function destroy(){
        $this->validate($request, [
            'id' => 'required|exists:users'
        ]);
        $sekolah = Sekolah::findOrFail($request->input('id'));
        $sekolah->delete();
    }
}