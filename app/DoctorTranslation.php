<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    protected $guarded = [];

    /**
     *
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
