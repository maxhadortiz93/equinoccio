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


use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Lista de Clientes
Route::get('/users', function (){    
      return Response::json((App\User::with('phone','location','social')->where('type','cliente')->get()));
});
// Lista de Taxistas
Route::get('/drivers', function (){    
    return Response::json((App\User::with('phone','location','social')->where('type','taxista')->get()));
});

//Crear el Usuario
Route::post('/user', function(Request $request){
    $user = factory(App\User::class)->create();
    //Modelo Phone
    $phone = new App\Phone();
    $phone->phone_local = '+58 02934331307';
    $phone->phone_movil = '+58 0412-1866163';
    $user->phone()->save($phone);

    //Modelo Location
    $location = new App\Location();
    $location->country = 'Venezuela';
    $location->city = 'Sucre';
    $location->location = 'La Granaja, Sector Cantarrana';
    $location->code_postal = '6101';
    $user->location()->save($location);


    //Modelo Social
    $social = new App\Social();
    $social->url = 'https://www.google.co.ve/';
    $social->act = 'act-1';
    $social->facebook = 'https://www.facebook.com/';
    $social->instagram = 'https://www.instagram.com/';
    $social->twitter = 'https://twitter.com/home';
    $social->youtube = 'https://www.youtube.com/';
    $social->pagina_web = 'https://laravel.com/docs/5.8/routing';
    $social->id_google = 'https://www.google.co.ve/';
    $social->id_token = 'https://www.google.co.ve/';
    $social->url_imagen = 'https://placekitten.com/200/300';
    $user->social()->save($social);
});

//Modificar el Usuario
Route::post('/user', function(Request $request){

});






