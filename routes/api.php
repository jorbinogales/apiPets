<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\RaceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




/* PUBLIC */
Route::middleware('api')->group(function () { 
     /* API RESOURCE */

     /* INSTITUTION */
    Route::prefix('institution')->group(function () {

        Route::get('', [InstitutionController::class, 'index']);
        Route::post('', [InstitutionController::class, 'store']);
        Route::apiResource('', InstitutionController::class, array('as' => 'institution'))
                    ->except(['index, store'])
                    ->parameters(['' => 'institution']);
    
        
    });

    /* PET */
    Route::prefix('pet')->group(function (){

        Route::get('', [PetController::class, 'index']);
        Route::post('', [PetController::class, 'store']);
        Route::post('/{pet}', [PetController::class, 'update']);

        Route::apiResource('', PetController::class, array('as' => 'pet'))
                ->except(['index', 'store', 'update'])
                ->parameters(['' => 'pet']);

    });

    /* SPECIES */

    Route::prefix('species')->group(function (){

        Route::get('', [SpeciesController::class, 'index']);
        Route::post('', [SpeciesController::class, 'store']);

        Route::apiResource('', SpeciesController::class, array('as' => 'species'))
                ->except(['index', 'store'])
                ->parameters(['' => 'species']);

    });

    /* RACE */

    Route::prefix('race')->group(function (){

        Route::get('', [RaceController::class, 'index']);
        Route::post('', [RaceController::class, 'store']);

        Route::apiResource('', RaceController::class, array('as' => 'race'))
                ->except(['index', 'store'])
                ->parameters(['' => 'race']);

    });

});

