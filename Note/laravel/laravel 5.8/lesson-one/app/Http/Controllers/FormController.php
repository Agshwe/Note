<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\items;


class FormController extends Controller
{
//---------- fomrcontroller ထဲမှာရှိတဲ့ method အားလုံးကို Auth user ဖစ်မှ လုပ်ခွင့်ရချင်လို့ method တွေရဲ့ အပေါဆုံးမှာ construct ရေ:ပီးကာလိုက်တာ
        public function __construct()
        {
            $this->middleware('auth'); //Auth မဖစ်တဲ့လူဆိုရင် FormController ထဲရှိ method အားလုံးကို ကာမယ်။
            $this->middleware('admin')->only(['destroy']);
        }

//---------- fomrcontroller ထဲကမှ form() နဲ့ store() နဲကို ့ auth မလုပ်ထားလဲ လုပ်ခွင့်ပေးမယ်ဆိုရင် except လေးထည့်ပေးရတယ်။
        // public function __construct()
        // {
        //      //$this->middleware('auth')->except(['form','store']); //Auth မဖစ်တဲ့လူဆိုရင် formcontroller ထဲမှာ ရှိတဲ့ store method နဲ့ create ကလွဲလို့ ကျန်တဲ့ method အားလုံးကို ကာမယ်  delter နှိတ်လိုက်ရင်တောင် login ပြန်၀င်ခိုင်းမာ
        //      $this->middleware('auth')->only(['destroy']);   //Auth မဖစ်တဲ့လူဆိုရင် destroy  method ကိုပဲကာမယ် ကျန်တဲ့ method အားလုံးမကာဘူး
         
        // }


    public function form(){
        return view('request_response.form_create');
    }

    //compact နဲ့ data ပို့နည်း
        // public function store(Request $request){
        //     $name=$request->name;
        //     $price=$request->price;
        //     return view('request_response.response',compact('name','price'));
        // }
    // with နဲ့ ပို့  section နဲ့ပြန်ယူတာ
        public function store(Request $request){

            $validatedData = $request->validate([
                'name' => 'required|min:5|max:10',
                'price' => 'required|min:4|max:5',  
                'stock' => 'required||min:1|max:6'
               
            ]);

            $items=new Items;
            $items->name=$request->name;
            $items->price=$request->price;
            $items->stock=$request->stock;

            $items->save();
            return redirect()->route('form_create')->with("reqname",$request->name."is added");
        }

     
//---------------------------edit နဲ့ update 

        public function edit($id){   // url မာပါလာမယ့် id နံပတ်ကို $id ထဲထည့်မယ်။
            $data=Items::find($id); // find($id)ဆိုတာ db ထဲကနေ url မာပါလာမဲ့ id နံပတ် အတန်းကို ရှာယူမာလို့ပြောတာ
            return view('request_response.form_edit',compact('data'));

        }

        public function update($id,Request $request){
            $database=Items::find($id); // 
            $database->name=$request->name;
            $database->price=$request->price;
            $database->stock=$request->stock;
            $database->update();
            return redirect()->route('form_create')->with('update',"Id No".$database->id. "is updated");
            
        }

//---------------------------destroy     
        public function destroy($id){
            $getitemsbyid= Items::find($id);
            $deleted_id=$getitemsbyid->id;
            $getitemsbyid->delete();
            return redirect()->route('form_create')->with("deleted_id",$deleted_id."is deleted");
        }



}
