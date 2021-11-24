<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentTranslation extends Model
{
    protected $guarded = [];

    /**
     *
     */
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
