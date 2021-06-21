<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Species extends Model
{
    use HasFactory, SoftDeletes;
    

    protected $fillable = [
        'name',
    ];
    

    /**
     * Get All races for the species
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function races()
    {
        return $this->hasMany(Race::class);
    }


}
