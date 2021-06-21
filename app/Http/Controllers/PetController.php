<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Exception;
use App\Utils\ImageTrait;
use Date;

class PetController extends Controller
{
    use ImageTrait;

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->showAll(PetResource::collection(Pet::get()));
    }


     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        try {

            return $this->showOne(new PetResource($pet));

        } catch (Exception $e){

            return $e;

        }
    }


    /**
     * @param \App\Http\Request\PetRequest $request
     * @return Illuminate\Http\Response
     */

    public function store(PetRequest $request)
    {
        DB::beginTransaction();
        try{

            $name = str_replace(' ','-', $request->name);
            $date = Date('y-m-d_h-s');
            $birth = $request->birth;

            $pet = Pet::create([
                'name' => $request->name,
                'institution_id' => $request->institution_id,
                'race_id' => $request->race_id,
                'birth' => $request->birth,
                'picture' => ($request->hasFile('picture')) 
                             ? $request->file('picture')->storeAs("pets", "$name"."$date.png", 'public') 
                             : null,
            ]);


            DB::commit();

            return $this->successfullResponse();

        } catch (Exception $e){
            DB::rollBack();
            return $e;

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(PetRequest $request, Pet $pet)
    {
        DB::beginTransaction();
        try {

            $date = Date('y-m-d_h:s');
            $pet->name = $request->name;
            $pet->institution_id = $request->institution_id;
            $pet->race_id = $request->race_id;

            if($request->hasFile('picture')){

                $name = str_replace(' ', '-', $request->name);

                $this->deleteImage($pet->picture);

                $pet->picture = $request->file('picture')->storeAs('pets', "$name-$date.png", 'public');

            }

            $pet->saveOrFail();
            DB::commit();

            return $this->successfullResponse();
           
        } catch(Exception $e) {
            DB::rollBack();
            return $e;

        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        DB::beginTransaction();
        try {

            $this->deleteImage($pet->picture);
            $pet->delete();

            DB::commit();

            return $this->successfullResponse();

        } catch (Exception $e){
            
            DB::rollBack();
            return $e;

        }
    }

}
