    
   <h1>{{ $modo}} EMPLEADO</h1> 
    
    
    
    <label for="Nombre">Nombre</label>
    <input type="text" name ="Nombres" id ="Nombre" value="{{isset($empleado->Nombres) ? $empleado->Nombres : ''}}">
    <br>

    <label for="PrimerAp">Primer  Apellido</label>
    <input type="text" name ="PrimerApel" id="PrimerAp" value="{{isset($empleado->PrimerApel) ? $empleado->PrimerApel : ''}}"> 
    <br>

    <label for="SegundoAp">Segundo Apellido</label>
    <input type="text" name ="SegundoApel" id ="SegundoAp" value="{{isset($empleado->SegundoApel) ?  $empleado->SegundoApel : ''}}">
    <br>

    <label for="correo">correo</label>
    <input type="text" name ="Correo" id="correo" value="{{isset($empleado->Correo) ? $empleado->Correo : ''}}">
    <br>

    @if (isset($empleado->Foto))
    <img src="{{asset('storage').'/'. $empleado->Foto}}" alt="">    
    @endif

    <label for="foto">foto</label>
    <input type="file" name="Foto" id="foto" value="">
    <br>
    
    
    <input type="submit" value ="{{$modo}}"><br><br>
    <a href="{{url('empleado')}}">Regresar</a>