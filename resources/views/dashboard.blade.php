@extends('layouts.app')

@section('title','Administrador')
@section('content')
    
<div class="wrapper">

@include('layouts.nav') 

 
<div class="content-wrapper"><!-- Container-fluid starts -->
   
   <div class="container-fluid"><!-- Main content starts -->

    <div class="row">
        <div class="main-header">
            <h4>    
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    </div>
                @endif
            </h4>
        </div>
    </div>


</div><!-- Main content ends -->

</div><!-- Container-fluid ends -->



</div>
@endsection