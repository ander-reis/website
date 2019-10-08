<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_admin_home_page';

    /**
     * mutators
     *
     * @param $value
     * @return bool|false|mixed|string|string[]|null
     */
    public function getDsCategoriaAttribute($value)
    {
        return mb_strtoupper($value);
    }
}
