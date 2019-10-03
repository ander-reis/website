<?php
namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        foreach ($words as $i => $value) {
            DB::connection('sqlsrv-site')->insert('INSERT INTO tb_sinpro_busca_termos (txt_termo) values (?)', [$words[$i]]);
        }

        $noticias = Noticias::where('ds_palavra_chave','like','%'. $termo .'%')
        ->orderBy('id_noticia','desc')->get();
        
        $clausulas = DB::connection('sqlsrv-site')->table('tb_sinpro_convencoes_clausulas')
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Website\Busca  $busca
     * @return \Illuminate\Http\Response
     */
    public function edit(Busca $busca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Website\Busca  $busca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Busca $busca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Website\Busca  $busca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Busca $busca)
    {
        //
    }
}
