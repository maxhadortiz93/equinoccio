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
Route::get('/api/users', function (){    
      return Response::json((App\User::with('phone','location','social')->where('type','cliente')->get()));
});
// Lista de Taxistas
Route::get('/api/drivers', function (){    
    return Response::json((App\User::with('phone','location','social')->where('type','taxista')->get()));
});

//Crear el Usuario
Route::post('/api/user', function(Request $request){
    $user = new App\User;
    $data = $request->json()->all();
    
    $user->type         = $data['type'];
    $user->name         = $data['name'];
    $user->apellido     = $data['apellido'];
    $user->birthdate    = $data['birthdate'];
    $user->genero       = $data['genero'];
    $user->cedula       = $data['cedula'];
    $user->email        = $data['email'];
    $user->password = Hash::make($data['password']);
    $user->save();
    
    //Modelo Phone
    $phone = new App\Phone();
    $phone->phone_local = $data['phone_local'];
    $phone->phone_movil = $data['phone_movil'];
    $user->phone()->save($phone);

    //Modelo Location
    $location = new App\Location();
    $location->country      = $data['country'];
    $location->city         = $data['city'];
    $location->location     = $data['location'];
    $location->code_postal  = $data['code_postal'];
    $user->location()->save($location);

    //Modelo Social
    $social = new App\Social();
    $social->url        = $data['url'];
    $social->act        = $data['act'];
    $social->facebook   = $data['facebook'];
    $social->instagram  = $data['instagram'];
    $social->twitter    = $data['twitter'];
    $social->youtube    = $data['youtube'];
    $social->pagina_web = $data['pagina_web'];
    $social->id_google  = $data['id_google'];
    $social->id_token   = $data['id_token'];
    $social->url_imagen = $data['url_imagen'];
    $user->social()->save($social);
    

    return Response::json(['Respuesta' => TRUE], 201);
});

//Crear el Taxista
Route::post('/api/driver', function(Request $request){
    $user = new App\User;
    $data = $request->json()->all();
    
    $user->type         = $data['type'];
    $user->name         = $data['name'];
    $user->apellido     = $data['apellido'];
    $user->birthdate    = $data['birthdate'];
    $user->genero       = $data['genero'];
    $user->cedula       = $data['cedula'];
    $user->email        = $data['email'];
    $user->password = Hash::make($data['password']);
    $user->save();
    
    //Modelo Phone
    $phone = new App\Phone();
    $phone->phone_local = $data['phone_local'];
    $phone->phone_movil = $data['phone_movil'];
    $user->phone()->save($phone);

    //Modelo Location
    $location = new App\Location();
    $location->country      = $data['country'];
    $location->city         = $data['city'];
    $location->location     = $data['location'];
    $location->code_postal  = $data['code_postal'];
    $user->location()->save($location);

    //Modelo Social
    $social = new App\Social();
    $social->url        = $data['url'];
    $social->act        = $data['act'];
    $social->facebook   = $data['facebook'];
    $social->instagram  = $data['instagram'];
    $social->twitter    = $data['twitter'];
    $social->youtube    = $data['youtube'];
    $social->pagina_web = $data['pagina_web'];
    $social->id_google  = $data['id_google'];
    $social->id_token   = $data['id_token'];
    $social->url_imagen = $data['url_imagen'];
    $user->social()->save($social);
    

    return Response::json(['Respuesta' => TRUE], 201);
});

//Modificar el Usuario
Route::post('/user', function(Request $request){

});






