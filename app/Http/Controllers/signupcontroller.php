<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class signupcontroller extends Controller
{   public function index(Request $req){
    if($req->input('find')){
        $query = "Select posts.*,categories.category from posts join categories on posts.category_id = categories.id where title like :title;";
        $title = "%".$req->input('find')."%";
        $row = DB::select($query,['title' => $title]);
    }elseif($req->input('cat')){
        $query = "Select posts.*,categories.* from posts join categories on posts.category_id = categories.id where categories.id = :id ;";
        $cat = $req->input('cat');
        $row = DB::select($query,["id" =>$cat]);
    }
    else{
    $query = "Select posts.*,categories.category from posts join categories on posts.category_id = categories.id ORDER BY `posts`.`created_at` DESC;";
    $row = DB::select($query);
    
    }   
        $query2 = "Select * from categories;";
        $cat = DB::select($query2);
        $data['cat'] = $cat;
        $data['row'] = $row;
        $data['page_title'] = 'register';
            
        return view('auth.register',$data);
    }
  
    
    public function save(Request $req){
    
        $validated = $req->validate([
            'name' => "required|alpha ",
            'email' => "required|email|unique:users",
            'password' => "required",
        ]);
        
       $user = new User();
    
        $user->insert([
           'name' => $req->input("name"),
            'email' => $req->input("email"),
            'password' => Hash::make($req->input("password")),
            'created_at' => date("y-m-d H:i:s"),
            'updated_at' => date("y-m-d H:i:s")
        ]);
            
        return redirect('admin/users');
    }
}
