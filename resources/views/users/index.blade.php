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
                                    <a onclick="addForm()"><button type="button" class="btn btn-sm btn-primary  waves-effect waves-light pull-right" data-toggle="tooltip" data-placement="top" title="Agregar Usuario" data-original-title="Agregar Usuario"><i class="fas fa-user-plus"></i>  </button></a>

                                    <table id="UserTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Edición</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Table ends -->

                @include('form')
            <!-- Row end -->
            <!-- Tables end -->
        </div>

        <!-- Container-fluid ends -->
    </div>



</div>
@endsection
