<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Http\Requests\SpeciesRequest;
use App\Http\Resources\SpeciesResource;
use Illuminate\Http\Request;
use Exception;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(SpeciesResource::collection(Species::get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SpeciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeciesRequest $request)
    {
        try {

            Species::create($request->validated());
            return $this->successfullResponse();

        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        try {

            return $this->showOne(new SpeciesResource($species));

        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SpeciesRequest  $request
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(SpeciesRequest $request, Species $species)
    {
        try {

            $species->update($request->validated());

            return $this->successfullResponse();

        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy(Species $species)
    {
        try {

            $species->delete();
            return $this->successfullResponse();

        } catch (Exception $e){
            return $e;
        }
    }
}
