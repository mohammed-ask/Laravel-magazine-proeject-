<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\myPage;
class homecontroller extends Controller
{
    public function index(Request $req){
        $limit = 8;
        $page = $req->input('page')? (int)$req->input('page'): 1;
        $offset = ($page - 1)* $limit;   
        $page_class = new myPage();
        $links = $page_class->make_links($req->fullUrlWithQuery(['page'=>$page]),$page,1);                         
        
        
        if($req->input('find')){
            $query = "Select posts.*,categories.category from posts join categories on posts.category_id = categories.id where title like :title limit $limit offset $offset;";
            $title = "%".$req->input('find')."%";
            $row = DB::select($query,['title' => $title]);
        }elseif($req->input('cat')){
            $query = "Select posts.*,categories.* from posts join categories on posts.category_id = categories.id where categories.id = :id limit $limit offset $offset;";
            $cat = $req->input('cat');
            $row = DB::select($query,["id" =>$cat]);
        }
        else{
        $query = "Select posts.*,categories.category from posts join categories on posts.category_id = categories.id ORDER BY `posts`.`created_at` DESC limit $limit offset $offset;";
        $row = DB::select($query);
        
        }
        $query2 = "Select * from categories;";
        $cat = DB::select($query2);
        
        $data['row'] = $row;
        $data['cat'] = $cat;
        $data['limit'] = $links;
        
        $data['page_title'] = 'Home';
        
          
        return view('index',$data);
    }
    
    public function save(Request $req){
    
        $validate = $req->validate([
            'key' => "required|string",
            'key' => "required|image"
        ]);
        
        return view('view');
    }
}
