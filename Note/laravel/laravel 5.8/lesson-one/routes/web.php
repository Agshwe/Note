<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('service',function(){
//     return view('service');
// });
// Route::redirect('/aaa', '/about');

// Route::view('service','service'); //service လို့ရေးလိုက်၇င် veiw ထဲက service ကိုသွားမယ်
// Route::view('about','about')->name('about');  // route name ပေးလိုက်တာ
// Route::view('home','home');

//Controller
// Route::get("page","PageController@page");
// Route::get('page/{id}','PageController@detail');





//----------------form CRUD------------------------
//      create နဲ့ store နဲံက url လမ်းကြောင်းတူရမယ်။
Route::get("form","FormController@form")->name('form_create');
Route::post("form","FormController@store")->name('form_store');


//edit &update ကလည်း url လမ်းကြောင်းတူရမယ်။
// update အတွက်ဆိုရင် form ရဲ့ action မှာ $data->id ပါထည့်ရေးပေးရတယ် <form action="{{route('form_update',$data->id)}}" method="post">
Route::get("form-edit/{id}","FormController@edit")->name('form_edit');
Route::post("form-edit/{id}","FormController@update")->name('form_update');


//delete 
Route::get("form-delete/{id}","FormController@destroy")->name('form_destroy');
Auth::routes();


//Auth လုပ် လို့ တိုးလာတဲံ 2ကြောင်း
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//Acess deinied 
Route::view('/denied','denied')->name('denied');