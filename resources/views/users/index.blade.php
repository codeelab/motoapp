@extends('layouts.app')

@section('content')


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
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Usuarios</a>
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
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table id="UserTable" class="table table-striped table-bordered nowrap dataTable">
                                        <thead>
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th colspan="3">Edición</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->nombre }}</td>
                                                <td>{{ $user->a_paterno }}</td>
                                                <td>{{ $user->a_materno }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                @can('users.show')
                                                <td width="10px">
                                                    <a href="{{ route('users.show', $user->id) }}" 
                                                    class="btn btn-sm btn-default">
                                                        ver
                                                    </a>
                                                </td>
                                                @endcan
                                                @can('users.edit')
                                                <td width="10px">
                                                    <a href="{{ route('users.edit', $user->id) }}" 
                                                    class="btn btn-sm btn-default">
                                                        editar
                                                    </a>
                                                </td>
                                                @endcan
                                                @can('users.destroy')
                                                <td width="10px">
                                                    {!! Form::open(['route' => ['users.destroy', $user->id], 
                                                    'method' => 'DELETE']) !!}
                                                        <button class="btn btn-sm btn-danger">
                                                            Eliminar
                                                        </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
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
    </div>
</div>
@endsection