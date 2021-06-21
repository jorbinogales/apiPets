<?php 

namespace App\Utils;

use Exception;
use Illuminate\Support\Facades\Storage;


trait ImageTrait
{
    /**
     * Remove previous image if it exits
     * 
     * @param $image_hat
     * @param $distk (default = 'public')
     */
    protected function deleteImage($image_path, $disk = 'public')
    {
        try{
            if(Storage::disk($disk)->exists($image_path)){
                Storage::disk($disk)->delete($image_path);
            }
            return true;
        } catch (Exception $e){
            return $e;
        }
    }
}