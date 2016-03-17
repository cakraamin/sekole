<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Program;
use App\Category;
//use Illuminate\Routing\Controller;

class ProgramController extends BaseController
{
    public function index(){
        return Program::all();
    }

    public function create(){
        $data = array(
            'category'      => Category::all()
        );

        return json_encode($data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'  => 'required',            
        ]); 
        $program   = new Program;
        $program->name  = $request->input('name');        
        $program->save();
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name'  => 'required',            
        ]); 
        $program   = Program::findOrFail($id);
        $program->name  = $request->input('name');        
        $program->save();
    }

    public function destroy(){
        $this->validate($request, [
            'id' => 'required|exists:users'
        ]);
        $program = Program::findOrFail($request->input('id'));
        $program->delete();
    }
}