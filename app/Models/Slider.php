<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Website\Traits\SliderPaths;

class Slider extends Model
{
    use SliderPaths;

    protected $table = 'tb_sinpro_slider';

    public static function slider()
    {
        return Slider::where('fl_ativo', 1)->get();
    }
}
