<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Owner;
use App\Models\PetImage;
use Illuminate\Http\Request;
use App\Http\Requests\PetStore;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets= Pet::orderBy('id', 'ASC')->paginate(10);
        return view('dashboard.pet.index',['pets'=>$pets]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::pluck('id','name');
        return view('dashboard.pet.create',['pet' =>new Pet(), 'owners'=>$owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetStore $request)
    {
        Pet::create($request ->validated());
        return back()->with('status','Mascota creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return view('dashboard.pet.show', ['pet'=>$pet]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        /* dd(PetImage::create(['image'=> "prueba", 'pet_id'=>1]));
        dd($pet->image); */
        $owners = Owner::pluck('id','name');
        return view('dashboard.pet.edit', ['pet'=>$pet, 'owners'=>$owners]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(PetStore $request, Pet $pet)
    {
        $pet ->update($request ->validated());
        return back()->with('status','Mascota actualizada con éxito');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet ->delete();
        return back()->with('status', "La mascota ha sido eliminada con éxito");
    }

    public function image(Request $request, Pet $pet){
        $request -> validate(
            ['image' => 'required|mimes:jpeg,png,jpg,pdf|max:20000']
        );
        $filename = time().".".$request->image->extension();
        $request ->image->move(public_path('images'),$filename);
        echo "Se ha cargado la imagen satisfactoriamente".$filename;
        PetImage::create(['image'=> $filename, 'pet_id'=>$pet->id]); 
        return back()->with('status', 'Imagen cargada con éxito');
    }
}
