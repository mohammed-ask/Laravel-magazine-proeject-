<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class logoutcontroller extends Controller
{
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
}
    
    public function save(Request $req){
    
        $validate = $req->validate([
            'key' => "required|string",
            'key' => "required|image"
        ]);
        
        return view('view');
    }
}
