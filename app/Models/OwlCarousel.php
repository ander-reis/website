<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class OwlCarousel extends Model
{

    protected $connection = 'sqlsrv-website';

    protected $table = 'tb_sinpro_owl_carousel';
}
