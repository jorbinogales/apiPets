<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'species_id',
        'name',
    ];


    /**
     * Get the Species that ows the race
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

}
