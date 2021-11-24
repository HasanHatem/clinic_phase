<?php

namespace App;

use App\Traits\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Doctor extends Model
{
    use Translateable;

    protected $guarded = [];

    /**
     *
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }

        return $this->hasOne(DoctorTranslation::class)->where('locale', '=', $language);
    }
}
