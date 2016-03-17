<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Registrasi;
use App\Sekolah;
//use Illuminate\Routing\Controller;

class RegistrasiController extends BaseController
{
    public function index(){
        return Registrasi::all();
    }

    public function create(){
        $data = array(
            'sekolah'   => Sekolah::all()
        );

        return json_encode($data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama'  => 'required',
            'hp'  => 'required',
            'email'  => 'required',
            'sekolah_id'  => 'required',
            'status'  => 'required',
            'registrasi_key'  => 'required',           
        ]); 
        $registrasi   = new Registrasi;
        $registrasi->nama  = $request->input('nama');
        $registrasi->hp  = $request->input('hp');
        $registrasi->status  = 0;
        $registrasi->email  = $request->input('email');
        $registrasi->sekolah_id  = $request->input('sekolah_id');
        $registrasi->registrasi_key  = $request->input('registrasi_key');        
        $registrasi->save();
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'nama'  => 'required',
            'hp'  => 'required',
            'email'  => 'required',
            'sekolah_id'  => 'required',
            'status'  => 'required',
            'registrasi_key'  => 'required',           
        ]); 
        $registrasi   = Registrasi::findOrFail($id);
        $registrasi->nama  = $request->input('nama');
        $registrasi->hp  = $request->input('hp');
        $registrasi->status  = 0;
        $registrasi->email  = $request->input('email');
        $registrasi->sekolah_id  = $request->input('sekolah_id');
        $registrasi->registrasi_key  = $request->input('registrasi_key');        
        $registrasi->save();
    }

    public function destroy(){
        $this->validate($request, [
            'id' => 'required|exists:users'
        ]);
        $registrasi = Registrasi::findOrFail($request->input('id'));
        $registrasi->delete();
    }
}