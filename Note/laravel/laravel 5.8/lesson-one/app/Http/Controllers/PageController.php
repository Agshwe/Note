<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  
    public function page(){
        return "I am page";
    }

    public function detail($id){
        return view('detail',compact('id')); 
        // compact ဆိုတာ detail file ကိုသွားရင် $id ကိုပါ သယ်သွားဖို့ compact('id')ကိုသုံးတာ 
    }
}
