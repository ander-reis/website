<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Website\Traits\SliderPaths;

class Slider extends Model
{
    use SliderPaths;

    /**
     * table
     * @var string
     */
    protected $table = 'tb_sinpro_slider';

    /**
     * @return mixed
     */
    public static function slider()
    {
        return Slider::where('fl_ativo', 1)->orderBy('fl_ordem')->get();
    }
}
