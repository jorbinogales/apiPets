<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Http\Requests\RaceRequest;
use App\Http\Resources\RaceResource;
use Illuminate\Http\Request;
use Exception;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(RaceResource::collection(Race::get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\RaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RaceRequest $request)
    {
        try {

            Race::create($request->validated());

            return $this->successfullResponse();

        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        try {

            return $this->showOne(new RaceResource($race));

        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RaceRequest $request
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(RaceRequest $request, Race $race)
    {
        try { 

            $race->update($request->validated());

            return $this->successfullResponse();
            
        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        try {

            $race->delete();
            return $this->successfullResponse();

        } catch (Exception $e){

            return $e;

        }
    }
}
