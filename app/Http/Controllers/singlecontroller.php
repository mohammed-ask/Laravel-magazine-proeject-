<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class singlecontroller extends Controller
{
    public function index(Request $req,$id= ""){
        $query = "select * from posts where slag = :slag limit 1";
        $row = DB::select($query,['slag'=> $id]);
        $data['row']=$row;
        if($req->input('find')){
            $query = "Select posts.*,categories.category from posts join categories on posts.category_id = categories.id where title like :title;";
            $title = "%".$req->input('find')."%";
            $row = DB::select($query,['title' => $title]);
        }elseif($req->input('cat')){
            $query = "Select posts.*,categories.* from posts join categories on posts.category_id = categories.id where categories.id = :id ;";
            $cat = $req->input('cat');
            $row = DB::select($query,["id" =>$cat]);
        }
            if($row){
                $query = "select * from categories where id = :id limit 1";
                $category = DB::select($query,['id'=> $row[0]->category_id]);
                 $data['row']=$row[0];
                $data['category'] = $category[0];
                
            }

        $query = "select * from categories order by id desc";
        $categories = DB::select($query);
       
        $data['categories'] = $categories;
    
        
        return view('single',$data);
    }
    
    public function save(Request $req){
    
        $validate = $req->validate([
            'key' => "required|string",
            'key' => "required|image"
        ]);
        
        return view('view');
    }
}
