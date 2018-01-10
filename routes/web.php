<?php
use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
// First route that user visits on consumer app
Route::get('/ingreso', function () {
    // Build the query parameter string to pass auth information to our request
    $query = http_build_query([
        'client_id' => '7',
        'redirect_uri' => 'http://biblioteca.com/callback',
        'response_type' => 'code',
        'scope' => 'conference'
    ]);

    // Redirect the user to the OAuth authorization page
    return redirect('http://biblioteca.com/oauth/authorize?' . $query);
});

// Route that user is forwarded back to after approving on server
Route::get('callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://biblioteca.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 7, // from admin panel above
            'client_secret' => 'U6a25XaSgAmGPVP8eoac4J0L7QHPpHJ5HTivBaH2', // from admin panel above
            'redirect_uri' => 'http://biblioteca.com/callback',
            'code' => $request->code // Get code from the callback
        ]
    ]);

    // echo the access token; normally we would save this in the DB
    return json_decode((string) $response->getBody(), true)['access_token'];
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '7',
        'redirect_uri' => 'http://biblioteca.com/callback',
        'response_type' => 'token',
        'scope' => '',
    ]);

    return redirect('http://biblioteca.com/oauth/authorize?'.$query);
});

/**
 * del pusher inicio
 */
/**
 * este manda el mensaje
 */
Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
        'test-event',
        array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('vendor.push.notifica');
});
/**
 * est presenta el mensaje, solo present ael mensaje
 */
Route::get('/broadcast', function() {
    event(new \App\Events\TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('vendor.push.notifica');
});
/**
 * del pusher fin
 */

Route::resource('admin/perfiles_biblioteca', 'PerfilesBibliotecaController');
Route::get('admin/perfiles_biblioteca/{id}/predelete', 'PerfilesBibliotecaController@predelete')->name('perfiles_biblioteca');

/**
php artisan crud:model PerfilesBiblioteca --fillable="['perfil_nombre']" --table=perfiles_biblioteca
php artisan crud:controller PerfilesBibliotecaController --crud-name=perfiles_biblioteca --model-name=PerfilesBiblioteca --view-path=directory --route-group=admin --required-fields="['perfil_nombre']"
php artisan crud:view perfiles_biblioteca --fields=perfil_nombre:string --view-path=directory --route-group=admin
*/

Route::resource('admin/usuario', 'UsuarioController');
Route::get('admin/usuario/{id}/predelete', 'UsuarioController@predelete')->name('usuarios');

/**
php artisan crud:model Usuario --fillable="['name','email','password','tipo_usuario','Empresa']" --table=users
php artisan crud:controller UsuarioController --crud-name=usuario --model-name=Usuario --view-path=directory --route-group=admin --required-fields="['name','email','password','tipo_usuario','Empresa']"
php artisan crud:view usuario --fields=name:string, email:email, password:password, tipo_usuario:string, Empresa:string --view-path=directory --route-group=admin
 */

Route::resource('admin/archivos', 'ArchivosController');
Route::get('admin/archivos/{id}/predelete', 'ArchivosController@predelete')->name('usuarios');

/*
php artisan crud:model Archivos --fillable="['nombre','filesize','filemtime','filedate','filetype','filename','filename_url','file_deleteURL','email','log_forma','nuevo','revicion','fecha_revicion','mensaje']" --table=archivos_biblioteca
php artisan crud:controller ArchivosController --crud-name=archivos --model-name=Archivos --view-path=directory --route-group=admin --required-fields="['nombre','filename']"
php artisan crud:view archivos --fields=nombre:string,filesize:string,filemtime:string,filedate:string,filetype:string,filename:string,filename_url:string,file_deleteURL:string,email:string,log_forma:string,nuevo:string,revicion:string,fecha_revicion:string,mensaje:string, --view-path=directory --route-group=admin
*/

/**
 * para subir archivos
 */
Route::get('image-upload',function(){
    return view('directory.uploadfile');
});
Route::post('image-upload','FileuploadingController@imageUploadPost');
//////////////////////////////////////////////////////////////////////////////////
Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
    'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[
    'as' => 'addentry', 'uses' => 'FileEntryController@add']);

Route::post('permisos_archivos','ArchivosController@archivo_permisos');

///////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////
/*
 * crud perfile archivo
 */
Route::resource('admin/archivos_perfiles', 'ArchivosPerfilesController');
Route::get('admin/archivos_perfiles/{id}/predelete', 'ArchivosPerfilesController@predelete')->name('usuarios');

/*
php artisan crud:model ArchivosPerfiles --fillable="['archivos_biblioteca_id','perfiles_biblioteca_id']" --table=archivos_perfiles_biblioteca
php artisan crud:controller ArchivosPerfilesController --crud-name=archivos_perfiles --model-name=ArchivosPerfiles --view-path=directory --route-group=admin --required-fields="['archivos_biblioteca_id','perfiles_biblioteca_id']"
php artisan crud:view archivos_perfiles --fields=archivos_biblioteca_id:number,perfiles_biblioteca_id:number --view-path=directory --route-group=admin
*/

Route::resource('admin/usuario_perfiles', 'UsuariosPerfilesController');
Route::get('admin/usuario_perfiles/{id}/predelete', 'UsuariosPerfilesController@predelete')->name('usuarios');

/*
php artisan crud:model UsuariosPerfiles --fillable="['user_id','perfiles_biblioteca_id']" --table=perfiles_usuario_biblioteca
php artisan crud:controller UsuariosPerfilesController --crud-name=usuario_perfiles --model-name=UsuariosPerfiles --view-path=directory --route-group=admin --required-fields="['user_id','perfiles_biblioteca_id']"
php artisan crud:view usuario_perfiles --fields=user_id:number,perfiles_biblioteca_id:number --view-path=directory --route-group=admin
*/

Route::get('arc', function () {
    $user = App\Archivos::find(1);

    foreach ($user->archivoperfileshm as $role) {
        //$role->deleted_at = Carbon::now();
        //$role->delete();
    }
    return "listo";
    //dd(\App\Archivos::find(3)->perfiles()->perfil_nombre);
});

Route::post('busqueda','BusquedaController@busquedaCon');