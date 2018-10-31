@extends('layouts.app')

@section('title','Usuarios')
@section('content')
    
<div class="wrapper">
@include('layouts.nav') 


    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Usuarios</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Table starts -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Listado de Usuarios</h5>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table id="UserTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Edición</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->nombre }} {{ $user->a_paterno }} {{ $user->a_materno }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>

                                                    @can('users.show')
                                                    
                                                    <a href="{{ route('users.show', $user->id) }}">
                                                    <button type="button" class="btn btn-sm btn-default btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                    </button>
                                                    </a>
                                                    
                                                    @endcan

                                                    @can('users.edit')

                                                    <a href="{{ route('users.edit', $user->id) }}">
                                                    <button type="button" class="btn btn-sm btn-info btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edición">
                                                    <i class="fas fa-edit"></i>
                                                    </button>
                                                    </a>

                                                    @endcan

                                                    @can('users.destroy')
                                                    {!! Form::open(['route' => ['users.destroy', $user->id], 
                                                        'method' => 'DELETE']) !!}
                                                    <button type="button" class="btn btn-sm btn-danger btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                    @endcan

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Table ends -->


            <!-- Row end -->
            <!-- Tables end -->
        </div>

        <!-- Container-fluid ends -->
    </div>



</div>
@endsection
