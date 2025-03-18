@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('mensaje'))
    {{Session::get('mensaje')}}
        
    @endif

    <form action="{{url('/empleado/'. $empleado->id)}}" method="POST" enctype="multipart/form-data">
        @csrf 
        {{method_field('PATCH')}}

        @include('empleado.form', ['modo'=>'EDITAR'])

    </form>
</div>
@endsection