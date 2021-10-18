<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    
    public function category(){
        
        return $this->hasMany(Category::class,'id','category_id');
        
    }
    
    public function str_to_url($url){
        $url = preg_replace('~[^\\pL0-9_]+~u','-',$url);
        $url = trim($url,"-");
        $url = iconv("utf-8","us-ascii//TRANSLIT",$url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~','',$url);
        return $url;
            
    }
}
