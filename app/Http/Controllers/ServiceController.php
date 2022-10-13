<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Site;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Service::simplePaginate(3);
        return view('services.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::All();
        return view('services.create',compact('sites'));
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
            'servicio' => 'required',
            'precio' => 'required',
        ]);

        if (isset($validations)) {
            $servicio = new Service();
            $servicio->servicio = $request->servicio;
            $servicio->precio = $request->precio;
            //1. Llevar esta fotografia como archivo
            $fotografia=$request->file('foto');
            // 2. Moverla a la carpeta img y getClientOriginal solo paso el nombre de la foto
            $fotografia->move('img',$fotografia->getClientOriginalName());
            //3. Guardando el nombre del archivo
            $servicio->foto = $fotografia->getClientOriginalName();
            $servicio->sitio_id = $request->sitio_id;
            $servicio->save();
            session()->flash('message','Servicio creado a satisfacción!!..');
            return redirect()->route('services.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
