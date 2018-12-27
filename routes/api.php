<?php

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/


//LISTA TODOS LOS USUARIOS A TRAVES DE DATATABLES CON AJAX SERVER SIDE
Route::get('users', function()
{
    $user = user::all();
 
    return Datatables::of($user)
        ->addColumn('show_photo', function($user){
            if ($user->foto == NULL){
                    return 'No existe';
            }
            return '<img class="rounded-square" width="35" height="35" src="'. url($user->foto) .'" alt="">';
        })
        ->addColumn('action', function($user)
        {
            return '<a href=""><button type="button" class="btn btn-sm btn-default btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Ver" data-original-title="Ver"><i class="fas fa-eye"></i></button></a><a onclick="editForm('. $user->id .')"><button type="button" class="btn btn-sm btn-info btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Edición"><i class="fas fa-edit"></i></button></a><a onclick="deleteData('. $user->id .')"><button type="button" class="btn btn-sm btn-danger btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Eliminar" data-original-title="Eliminar"><i class="fas fa-trash-alt"></i></button></a>';
        })
        ->rawColumns(['show_photo', 'action'])->toJson();
        

});
