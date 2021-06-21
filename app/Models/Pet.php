<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'institution_id',
        'name',
        'race_id',
        'birth',
        'picture',
    ];

    /**
     * Get the institution that owns the pets
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

     /**
     * Get the institution that owns the pets
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function picture()
    {
        return $this->morphone('App\Attachment', 'attachable');
    }


}
