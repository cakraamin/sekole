<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Category;
//use Illuminate\Routing\Controller;

class CategoryController extends BaseController
{
    public function index(){
        return Category::all();
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'  => 'required',            
        ]); 
        $category   = new Category;
        $category->name  = $request->input('name');        
        $category->save();
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name'  => 'required',            
        ]); 
        $category   = Category::findOrFail($id);
        $category->name  = $request->input('name');        
        $category->save();
    }

    public function destroy(){
        $this->validate($request, [
            'id' => 'required|exists:users'
        ]);
        $category = Category::findOrFail($request->input('id'));
        $category->delete();
    }
}