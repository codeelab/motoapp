<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Yajra\DataTables\DataTables;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('permission:users.store')->only(['store']);
      $this->middleware('permission:users.index')->only('index');
      $this->middleware('permission:users.edit')->only(['edit','update']);
      $this->middleware('permission:users.show')->only('show');
      $this->middleware('permission:users.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();
        $input['foto'] = null;
        if ($request->hasFile('foto')){
            $input['foto'] = '/upload/usuarios/'.str_slug($input['nombre'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/usuarios/'), $input['foto']);
        }
        User::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Usuario Creado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::get();
        $user = User::findOrFail($id);
        return $user;
        //return view('users.edit', compact('user','roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);
        $input['foto'] = $user->foto;
        if ($request->hasFile('foto')){
            if (!$user->foto == NULL){
                unlink(public_path($user->foto));
            }
            $input['foto'] = '/upload/usuarios/'.str_slug($input['nombre'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/usuarios/'), $input['foto']);
        }
        $user->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Usuario Actualizado'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!$user->foto == NULL){
            unlink(public_path($user->foto));
        }
        User::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Usuario Eliminado'
        ]);
    }

}