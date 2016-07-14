<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Room;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel_id = $_GET['id'];

        return view('rooms.create',compact('hotel_id'));
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
            'tarifa' => 'required',
            'max_personas' => 'required',
            
        ]);

        $hotel_id = $request->input('hotel_id');

        $room = Room::create([
            'nombre' => $request->input('nombre'),
            'hotel_id' => $hotel_id,
            'tarifa' => $request->input('tarifa'),
            'max_personas' => $request->input('max_personas')
        ]);

        return redirect()->route('hotels.show', [$hotel_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);

        return view('rooms.edit',compact('room'));
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
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'tarifa' => 'required',
            'max_personas' => 'required',
            
        ]);

        $room = Room::find($id);

        $room->update([
            'nombre' => $request->input('nombre'),
            'tarifa' => $request->input('tarifa'),
            'max_personas' => $request->input('max_personas')
        ]);

        return redirect()->route('hotels.show', [$request->input('hotel_id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        $hotel_id = $room->hotel->id;

        $room->delete();

        return redirect()->route('hotels.show', [$hotel_id]);
    }
}
