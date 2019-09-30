<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $connection = 'sqlsrv-site';

    protected $table = 'tb_sinpro_admin_home_page';

    public function getDsCategoriaAttribute($value)
    {
        return mb_strtoupper($value);
    }
}
