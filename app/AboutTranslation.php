<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    protected $guarded = [];

    /**
     *
     */
    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
