<?php
namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Busca;
use Website\Models\Noticias;
use Illuminate\Support\Facades\DB;

class BuscaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.busca.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Website\Busca  $busca
     * @return \Illuminate\Http\Response
     */
    public function show($termo)
    {
        // PROCEDIMENTO PARA INSERIR TERMOS NO BANCO
        $ig = array("DOS","DIA","POR","ANO","NOS","SEM","DAS","QUE","SAO","NAO","COM","TEM","SER","NAS","MES","ATE","FIM","AOS","UMA","BEM","PAI","VIA","PRA","FOI","DAR","RUA","SEU");
        $comAcentos = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ü', 'Ú');
        $semAcentos = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
        $text = trim(str_replace($comAcentos, $semAcentos, mb_strtoupper($termo))) ." ";
        $word = "";
        $words = array();

        while (strlen($text) != 0):

            $word = substr($text,0,strpos($text," "));

            if(strlen($word) > 2 && !in_array($word,$ig)) {
                $words[] = $word;
            }

            $text = ltrim(str_replace($word,"",$text));

            $word = "";

        endwhile;

        /**
         * insert tb_sinpro_busca_termos
         */
        $busca = new Busca();
        foreach ($words as $i => $value) {
            $busca->txt_termo = $words[$i];
            $busca->save();
        }

        /**
         * select tb_sinpro_noticias
         */
        $noticias = Noticias::where('ds_palavra_chave','like','%'. $termo .'%')
        ->orderBy('id_noticia','desc')->get();

        /**
         * select tb_sinpro_convencoes, tb_sinpro_convencoes_clausulas, tb_sinpro_convencoes_entidades
         */
        $clausulas = DB::table('tb_sinpro_convencoes_clausulas')
                    ->leftjoin('tb_sinpro_convencoes','tb_sinpro_convencoes.id_convencao','=','tb_sinpro_convencoes_clausulas.id_convencao')
                    ->leftjoin('tb_sinpro_convencoes_entidades','tb_sinpro_convencoes_entidades.id','=','tb_sinpro_convencoes.fl_entidade')
                    ->select('tb_sinpro_convencoes.fl_entidade',
                    'tb_sinpro_convencoes_clausulas.id_convencao',
                    'tb_sinpro_convencoes_clausulas.id_clausula',
                    'tb_sinpro_convencoes_clausulas.ds_titulo',
                    'tb_sinpro_convencoes_entidades.ds_entidade',
                    'tb_sinpro_convencoes.dt_validade')
                    ->where('tb_sinpro_convencoes_clausulas.fl_status', 1)
                    ->where('tb_sinpro_convencoes.fl_status', 1)
                    ->where('tb_sinpro_convencoes_clausulas.ds_palavra_chave','like','%'. $termo .'%')
                    ->orderBy('tb_sinpro_convencoes_clausulas.id_clausula','desc')
                    ->get();

        return view('website.busca.index', compact('noticias','clausulas','termo'));
   }
}
