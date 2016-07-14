<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Hotel;
use App\User;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = auth()->user();

       //dd($user->id);

       $hotels = Hotel::where('user_id',$user->id)->get();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = array("Amazonas","Anzoategui","Apure","Aragua","Barinas","Bolivar","Carabobo","Cojedes","Distrito Capital","Falcon","Guarico","Lara",
                        "Merida","Miranda","Monagas","Nueva Esparta","Portuguesa","Sucre","Tachira","Trujillo","Vargas","Yaracuy","Zulia");

        return view('hotels.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'nombre' => 'required|max:100',
            'tipo' => 'required',
            'fecha' => 'required',
            'direccion1' => 'required|max:100',
            'direccion2' => 'max:100',
            'estado' => 'required',
            'pais' => 'required',
            'postal' => 'required|max:5',
        ]);

        $user = $request->user();

        $direccion = $request->input('direccion1') . $request->input('direccion2');

        $hotel = Hotel::create([
            'nombre' => $request->input('nombre'),
            'user_id' => $user->id,
            'tipo' => $request->input('tipo'),
            'fecha' => $request->input('fecha'),
            'direccion' => $direccion,
            'estado' => $request->input('estado'),
            'pais' => $request->input('pais'),
            'postal' => $request->input('postal')
            
        ]);

        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);

        $rooms = $hotel->rooms()->get();

        return view('hotels.show',compact('hotel','rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = array("Amazonas","Anzoategui","Apure","Aragua","Barinas","Bolivar","Carabobo","Cojedes","Distrito Capital","Falcon","Guarico","Lara",
                        "Merida","Miranda","Monagas","Nueva Esparta","Portuguesa","Sucre","Tachira","Trujillo","Vargas","Yaracuy","Zulia");

        $hotel = Hotel::find($id);

        return view('hotels.edit',compact('hotel','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());

        $this->validate($request, [
            'nombre' => 'required|max:100',
            'tipo' => 'required',
            'fecha' => 'required',
            'direccion1' => 'required|max:100',
            'direccion2' => 'max:100',
            'estado' => 'required',
            'pais' => 'required',
            'postal' => 'required|max:5',
        ]);

        $hotel = Hotel::find($id);

        $direccion = $request->input('direccion1') . $request->input('direccion2');

        $hotel->update([
            'nombre' => $request->input('nombre'),
            'tipo' => $request->input('tipo'),
            'fecha' => $request->input('fecha'),
            'direccion' => $direccion,
            'estado' => $request->input('estado'),
            'pais' => $request->input('pais'),
            'postal' => $request->input('postal')
            
        ]);

        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        $hotel->delete();

        return redirect()->route('hotels.index');
    }
}
