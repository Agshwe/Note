<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;


class ApiItemsController extends Controller
{
    public function index(){
       $items= Items::all();
       return response($items,200);
    }

    public function show($id){
        $find=Items::find($id);
        return response($find,200);
    }

    public function store(Request $request){

        // postman software ထဲမှာ error ပြချင်လို့  validator စစ်တာ api အတွက်ဆို validator ရေ:နညး်က တမျိုးရေးရတယ်
        $validated = Validator::make($request->all(),[
            'name' => 'required|min:5|max:10',
            'price' => 'required|min:4|max:5',  
            'stock' => 'required||min:1|max:6'
           
        ]);
        if($validated->fails()){
            return  response($validated->error(),400);
        }

        $items=new Items;
        $items->name=$request->name;
        $items->price=$request->price;
        $items->stock=$request->stock;

        $items->save();

        return response($request,200);
    }
}
