<?php

namespace Website\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FichaProfessor extends Model
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
    protected $table = 'tb_jur_ficha_professor';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'jur_fip_cd_fic_pro';

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

    public function professor()
    {
        return $this->hasOne(CadastroProfessores::class, 'jur_fip_cd_professor');
    }
}
