<?php

namespace App;

use App\Traits\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use Translateable;

    protected $guarded = [];

    /**
     *
     */
    public function translation($langauge = null)
    {
        if ($langauge == null) {
            $langauge = App::getLocale();
        }

        return $this->hasOne(CategoryTranslation::class)->where('locale', '=', $langauge);
    }
}
