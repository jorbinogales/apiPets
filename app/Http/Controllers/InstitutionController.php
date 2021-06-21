<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
Use App\Http\Requests\InstitutionRequest;
Use App\Http\Resources\InstitutionResource;
Use App\Models\Institution;
use Exception;


class InstitutionController extends Controller
{

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   

        return $this->showAll(InstitutionResource::collection(Institution::get()));
    }

        /**
     * Store a newly created resource in storage.
     * @param Institution $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        try{

            return $this->showOne(new InstitutionResource($institution));
        
        } catch (Exception $e){

            return $e;
            
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Request\InstitutionRequest $request
     * @return \Illuminate\Http\Response
     */

    public function store(InstitutionRequest $request)
    {

        try{
            
            Institution::create($request->validated());

            return $this->successfullResponse();

        } catch (Exception $e){

            return $e;
        }

    }

    /**
     * @param \App\Http\Request\InstitutionRequest $request
     * @param Institution $institution
     * @return \Illuminate\Http\Response
     */

    public function update(InstitutionRequest $request, Institution $institution)
    {
        try {

            $institution->update($request->validated());

            return $this->successfullResponse();

        } catch (Exception $e){

            return $e;

        }
    }

    /**
     * 
     * @param Institution $institution
     * @return \Illuminate\Http\Response 
     */

    public function destroy(Institution $institution)
    {
        try{

            $institution->delete();
            return $this->successfullResponse();

        } catch (Exception $e){

           return $e;

        }
    }

}
