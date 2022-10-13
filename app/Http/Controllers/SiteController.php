<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::simplePaginate(6);
        return view('sites.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = request()->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        if (isset($validations)) {
            $sites = new Site();
            $sites->municipio = $request->municipio;
            $sites->lugar = $request->lugar;
            $sites->nombre = $request->nombre;
            $sites->direccion = $request->direccion;
            $sites->telefono = $request->telefono;
            $sites->correo = $request->correo;
            
            //1. Llevar esta fotografia como archivo
            $fotografia=$request->file('foto');
            // 2. Moverla a la carpeta img y getClientOriginal solo paso el nombre de la foto
            $fotografia->move('img',$fotografia->getClientOriginalName());
            //3. Guardando el nombre del archivo
            $sites->foto = $fotografia->getClientOriginalName();
            $sites->descripcion = $request->descripcion;
            $sites->tipo_actividad = $request->tipo_actividad;
            $sites->horario_atencion = $request->horario_atencion;
            $sites->estado = $request->estado;
            $sites->save();
            session()->flash('message','Sitio creado a satisfacción!!..');
            return redirect()->route('sites.create');
            //return json_encode($sites);
            /* $request = request()->all();
            return response()->json($request); */
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
    
       $services = Service::join("sites","services.sitio_id","=","sites.id")
                            ->where("sitio_id",$site->id)
                            ->select("services.servicio","services.precio")
                            ->get();
        return view('sites.show',compact('services','site'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return view('site.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
