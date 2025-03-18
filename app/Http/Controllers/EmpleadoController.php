<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('empleado.create');

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos = [
            'nombres' =>'required|string|max:100',
            'PrimerApel' =>'required|string|max:100',
            'SegundoApel' =>'required|string|max:100',
            'Correo' =>'required|email',
            'Foto' => 'required|max:1000|mimes:jpeg,png,jpg'
        ];

        $mensaje =[

            'required' => 'El :attribute es requerido',
            'foto.required' => 'la foto es requerida'
        ];


        $this->validate($request,$campos,$mensaje);



        $datos_empleado = request()->except('_token');


        if($request->hasFile('Foto')){

            $datos_empleado['Foto'] =$request->file('Foto')->store('uploads', 'public');
        }
        Empleado::insert($datos_empleado);

        return redirect('empleado')->with('mensaje','Empleado agregado exitosamente');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado= Empleado::findOrFail($id);
        return view('empleado.update', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $datos_empleado = request()->except('_token','_method');

        if($request->hasFile('Foto')){

            $empleado= Empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->Foto);

            $datos_empleado['Foto'] =$request->file('Foto')->store('uploads', 'public');
        }

        Empleado::where('id', '=', $id)->update($datos_empleado);
        $empleado= Empleado::findOrFail($id);
        return view('empleado.update', compact('empleado'));


        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)    
    {
        //

        
        $empleado= Empleado::findOrFail($id);
        if(Storage::delete('public/' . $empleado->Foto)){
            
            Empleado::destroy($id);
            
        };
        
        return redirect('empleado')->with('mensaje','Se Elimino el usuario con exito');

    }
}
