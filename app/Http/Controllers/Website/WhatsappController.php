<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\WhatsappRequest;
use Website\Models\Whatsapp;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('website.whatsapp.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('website.whatsapp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WhatsappRequest $request)
    {
        $data = $request->all('ds_celular', 'ds_nome', 'dt_pergunta', 'ds_pergunta', 'dt_resposta', 'ds_resposta');

        try {
            Whatsapp::create($data);
            toastr()->success('Informações cadastrada com sucesso!');
            return redirect()->route('whatsapp.create');
        } catch (\Exception $exception) {
            toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    /**
     * metodo pesquisar
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $data = null;
        $searchText = 'null';

        $validatedData = $request->validate([
            'searchInput' => 'required',
        ]);

        if (preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $validatedData['searchInput'])) {
            $data = dateFormattedDatabase($validatedData['searchInput']);
        } else {
            $searchText = "%{$validatedData['searchInput']}%";
        }

        $collection = Whatsapp::where(function($q) use($searchText, $data) {
                $q->orWhere('ds_celular', 'like', $searchText);
                $q->orwhere('ds_nome', 'like', $searchText);
                $q->orwhere('dt_pergunta', $data);
                $q->orwhere('ds_pergunta', 'like', $searchText);
                $q->orwhere('dt_resposta', $data);
                $q->orwhere('ds_resposta', 'like', $searchText);
        })->get(['ds_celular', 'ds_nome', 'dt_pergunta', 'ds_pergunta', 'dt_resposta', 'ds_resposta']);
//            ->toSql();

        $collection->map(function ($item) {
            return [
                $item->dt_pergunta = dataFormatted($item->dt_pergunta),
                $item->dt_resposta = dataFormatted($item->dt_resposta),
            ];
        });

        return response()->json(['model' => $collection]);
    }
}
