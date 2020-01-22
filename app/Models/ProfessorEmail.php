<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessorEmail extends Model
{
    /**
     * conexao database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_professor_email';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'pro_ema_nr_email';

    /**
     * set created_at
     */
    const CREATED_AT = null;

    /**
     * set updated_at
     */
    const UPDATED_AT = null;

    /**
     * set timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'pro_ema_cd_professor',
        'pro_ema_ds_email1',
        'pro_ema_ds_email2',
        'pro_ema_ds_email3'
    ];
}
