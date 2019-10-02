<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Website\Traits\SliderPaths;

class Intro extends Model
{
    protected $connection = 'sqlsrv-website';

    protected $table = 'tb_sinpro_intro';

    public static function intro()
    {
        return Intro::where('dt_de', '<=', date('Y-m-d H:i:s'))
                    ->where('dt_ate', '>=', date('Y-m-d H:i:s'))
                    ->take(1)
                    ->get();
    }
}
