<?php

namespace App\Http\Controllers;

use App\Models\WildAnimal as Animal;
use App\Http\Requests\StoreWildAnimalRequest;
use App\Http\Requests\UpdateWildAnimalRequest;

class WildAnimalController extends Controller
{

    public function index()
    {
        return view('animal.index', ['animals'=> Animal::all()]);
    }

    public function create()
    {

        return view('animal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWildAnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWildAnimalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WildAnimal  $wildAnimal
     * @return \Illuminate\Http\Response
     */
    public function show(WildAnimal $wildAnimal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WildAnimal  $wildAnimal
     * @return \Illuminate\Http\Response
     */
    public function edit(WildAnimal $wildAnimal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWildAnimalRequest  $request
     * @param  \App\Models\WildAnimal  $wildAnimal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWildAnimalRequest $request, WildAnimal $wildAnimal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WildAnimal  $wildAnimal
     * @return \Illuminate\Http\Response
     */
    public function destroy(WildAnimal $wildAnimal)
    {
        //
    }
}
