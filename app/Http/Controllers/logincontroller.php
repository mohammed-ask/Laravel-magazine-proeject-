<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    
    public function index(Request $req){
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
        $data['page_title'] = 'login';
            if(Auth::user())
                {
                  return redirect('admin');
                }
        return view('auth.login',$data);
    }
    
    public function save(Request $req){
    
        $validated = $req->validate([
            'email' => "required|email",
            'password' => "required"
        ]);
        
        if(Auth::attempt($validated,$req->input("remember"))){
            $req->session()->regenerate();
            return redirect()->intended('admin');
        }
        
        return back()->withErrors([
         'email' => "wrong email or password"   
        ]);
    }
    } 

