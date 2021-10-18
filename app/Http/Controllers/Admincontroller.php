<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\post;
use App\Models\category;
use App\Models\User;
use App\Models\myPage;

class Admincontroller extends Controller
{
    public function index(Request $req){
        
        $page_title = "Dashboard";
        return view('admin.admin',['pagetitle' => $page_title]);
    }
    
      public function Posts(Request $req,$type = "",$id = ""){
          switch ($type)
          {  case 'add':
          $cat = DB::table('categories')->pluck('category','id');
           
            if($req->method() == 'POST'){
                $post = new post();
                
                $validated = $req->validate([
                    "title" => 'Required|String|unique:posts',
                    "file" => 'Required|image',
                    "content" => 'Required',
                ]);
                
                $path = $req->file('file')->store('/',['disk'=>'my_disc']);
                     
               $data['title'] = $req->input('title');
                $cat_id = DB::table('categories')->where('category',$req->input('category_id'))->value('id');
                $data['category_id'] = $cat_id;
                 $data['image'] = $path;
                 $data['content'] = $req->input('content');
                $data['created_at']= date("y-m-d H:i:s");
                $data['updated_at']= date("y-m-d H:i:s");
                $data['slag']= $post->str_to_url($data['title']);
                  
             
                 $post->insert($data);
            }
            $page_title = "Add New Posts";
                  return view('admin.add_post',['pagetitle' => $page_title,'cat' => $cat]);
                      break;
           
           
           case 'edit':
           $cat = DB::table('categories')->pluck('category','id');
               $post = new post();
            if($req->method() == 'POST'){
               
                $validated = $req->validate([
                    "title" => 'Required|String',
                    "file" => 'image',
                    "content" => 'Required',
                ]);
                
                $updated = post::find($id);
                $updated ->title = $req->input('title');
                $cat_id = DB::table('categories')->where('category',$req->input('category_id'))->value('id');
                $updated ['category_id'] = $cat_id;
                 $updated ->content = $req->input('content');
                 if($req->file('file')){
                     $path = $req->file('file')->store('/',['disk'=>'my_disc']);
                     $updated ->image = $path;
                }
                 $updated->save();
                
               } 
                 $category = "";
                $find_post = $post->find($id);
           
            if($find_post){
                $category = $find_post->category->first();
            }
                $page_title = "Edit Post";
                  return view('admin.edit_post',[
                      'pagetitle' => $page_title,
                       'old_data' => $find_post,
                       'category' => $category,
                        'cat' => $cat
                        ]);
                      break;
           
           case 'delete':
               $post = new post();
               
               if($req->method() == 'POST'){
                   $delete= post::find($id);
                   $delete->delete();
                   return redirect(url("admin/posts"));
                       
               };    
           
               $find_post = $post->find($id);
               $page_title = "Delete Your Posts";
                  return view('admin.delete_post',[
                      'pagetitle' => $page_title,
                       'old_data' => $find_post,
                    ]);
                      break;
           default:
               $limit = 6;
               $page = $req->input('page')? (int)$req->input('page'): 1;
               $offset = ($page - 1)* $limit;   
               $page_class = new myPage();
               $links = $page_class->make_links($req->fullUrlWithQuery(['page'=>$page]),$page,1);                         
               $page_title = "Posts";
               
               $data = DB::table('posts')->get();
           $data2 = new post();
           $query = "Select posts.id,posts.title,posts.content,posts.image,posts.created_at,category from posts join categories on posts.category_id = categories.id limit $limit offset $offset";
           $new1 = DB::select($query);
           $data['data'] = $new1;
           $data['pagetitle'] = $page_title;
           $data['limit'] = $links;
           $new = $data2->get();
                  return view('admin.posts',$data);
                      break;
          
          }
          
       
          
    }
    
      public function Categories(Request $req, $type = "",$id = ""){
          switch ($type){
              case 'add':
                 
                  if($req->method() == 'POST'){
                      $cat = new category();
                   $validated = $req->validate([
                    "category" => 'Required|String|unique:categories',
                    
                    ]);
                    $data['category'] = $req->input('category');
                    $data['created_at']= date("y-m-d H:i:s");
                    $data['updated_at']= date("y-m-d H:i:s"); 
                    
                    $cat->insert($data);  
                  }
                  
                  $page_title = "Add New Category";
                  return view('admin.addcategory',['pagetitle' => $page_title]);
                      break;
                  
              case 'edit':
                   $cat = new category();
                  if($req->method() == 'POST'){
                      $validated = $req->validate([
                          'category' => 'Required|String|unique:categories',
                      ]);
                       $updated = category::find($id);
                      $updated['category'] = $req->input('category');
                       $updated->save();  
                  }
                   $data = $cat->find($id);
                  $page_title = "Edit Category";
                  return view('admin.editcategory',['pagetitle' => $page_title,'data' => $data]);
                      break;
                  
              case 'delete':
                    $cat = new category();
                  if($req->method() == 'POST'){
                      $delete= $cat::find($id);
                   $delete->delete();
                   return redirect(url("admin/categories"));
                       
                  }
                  $data = $cat->find($id);
                  $page_title = "Delete Category";
                  return view('admin.deletecategory',['pagetitle' => $page_title,'data' => $data]);
                      break;
                  
              default:
                      $data = DB::table('categories')->get();
                      
                      $page_title = "Categories";
                      return view('admin.categories',['pagetitle' => $page_title,'data' => $data]);
                      break;
          };
          
        
    }
    
      public function Users(Request $req,$type ="",$id=''){
          switch ($type){ 
         case 'edit':
                   $user = new User();
                  if($req->method() == 'POST'){
                      $validated = $req->validate([
                          'name' => 'Required|String',
                          'email' => 'Required|String',
                      ]);
                       $updated = User::find($id);
                      $updated['name'] = $req->input('name');
                      $updated['email'] = $req->input('email');
                       $updated->save();  
                  }
                   $data = $user->find($id);
                  $page_title = "Edit Category";
                  return view('admin.edituser',['pagetitle' => $page_title,'data' => $data]);
                      break;
                  
              case 'delete':
                  
                    $user = new User();
                  if($req->method() == 'POST'){
                      if($id == 10){
                          echo "<script> alert('This User Cannot be Deleted')</script>";
                          
                      }
                      else{
                          $delete= $user::find($id);
                   $delete->delete();
                   return redirect(url("admin/users"));
                      }
                       
                  }
                  $data = $user->find($id);
                  $page_title = "Edit Category";
                  return view('admin.deleteuser',['pagetitle' => $page_title,'data' => $data]);
                      break;
                  
              default:
                      $data = DB::table('users')->get();
                      
                      $page_title = "Users";
                      return view('admin.user',['pagetitle' => $page_title,'data' => $data]);
                      break;
          };
    }
    
    public function admin(Request $req,$type){
        
        
    }
    
    public function save(Request $req){
    
        $validate = $req->validate([
            'key' => "required|string",
            'key' => "required|image"
        ]);
        
      
}
}
