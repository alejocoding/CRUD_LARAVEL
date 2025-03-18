

    @if (count($errors) >0)


      <div class="alert alert-danger" role="alert">
          <ul>


              @foreach ($errors->all() as $error)

             <li>{{ $error}}</li>

              @endforeach
            </ul>
        </div>

    @endif
   <h1>{{ $modo}} EMPLEADO</h1>

    <div class="form-group">

    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name ="Nombres" id ="Nombre" value="{{isset($empleado->Nombres) ? $empleado->Nombres : old('Nombres')}}" >
    <br>

    <label for="PrimerAp">Primer  Apellido</label>
    <input type="text"  class="form-control" name ="PrimerApel" id="PrimerAp" value="{{isset($empleado->PrimerApel) ? $empleado->PrimerApel : old('PrimerApel')}}" >
    <br>

    <label for="SegundoAp">Segundo Apellido</label>
    <input type="text"  class="form-control" name ="SegundoApel" id ="SegundoAp" value="{{isset($empleado->SegundoApel) ?  $empleado->SegundoApel : ''}}" >
    <br>

    <label for="correo">correo</label>
    <input type="text"  class="form-control" name ="Correo" id="correo" value="{{isset($empleado->Correo) ? $empleado->Correo : ''}}" >
    <br>

    <label for="foto">foto</label>
    <input type="file" class="form-control" name="Foto" id="foto" value="{{isset($empleado->Foto) ? $empleado->Foto : ''}}" >
    <br>
    @if (isset($empleado->Foto))
    <img src="{{asset('storage').'/'. $empleado->Foto}}" class="img-img-thumbnail" alt="">
    @endif
   <br>
   <br>



    <input type="submit" class="btn btn-success" value ="{{$modo}}"><br><br>

    </div>
    <a href="{{url('empleado')}}" class="btn btn-primary">Regresar</a>
