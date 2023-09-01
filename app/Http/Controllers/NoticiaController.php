<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Http\Controllers\Requests;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "[ Index de Noticias ]";

        $noticias = Noticia::all();
        return view('viewsNoticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "Metodo CREATE";
        $this->authorize('create', Noticia::class);

        return view('viewsNoticias.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoticiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    /**Observe que aqui o Request foi personalizado devido a criacao do Model utilizando o --all
     * Assim, ele verifica se o usuario tem autorizacao para realizar a requisicao no arquivo
     * StoreNoticiaRequest. Isso tambem vale para o update
     */
    //public function store(Request $request)
    public function store(StoreNoticiaRequest $request)
    {
        //echo "Metodo STORE";
        $this->authorize('create', Noticia::class);
        
        $novanoticia = new Noticia();
        $novanoticia->titulo = $request->titulo;
        $novanoticia->descricao = $request->descricao;
        $novanoticia->user_id = auth()->user()->id;

        $novanoticia->save();

        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //echo "Metodo SHOW";
        $this->authorize('view', $noticia);

        return view('viewsNoticias.show', compact(['noticia']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //echo "Metodo EDIT";
        $this->authorize('update', $noticia);

        return view('viewsNoticias.edit', compact(['noticia']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoticiaRequest  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //echo "Metodo UPDATE";
        $this->authorize('update', $noticia);

        $noticia->titulo = $request->titulo;   
        $noticia->descricao = $request->descricao;
        $noticia->save();
        
        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //echo "Metodo DELETE (DESTROY)";
        $this->authorize('delete', $noticia);
        
        $noticia = Noticia::find($noticia->id);
        
        if(!isset($noticia)){
            $msg = "Não há [ Noticia ], com identificador [ $noticia->id ], registrada no sistema!";
            $link = "noticias.index";
            return view('noticias.erroid', compact(['msg', 'link']));
        }
        
        Noticia::destroy($noticia->id);
        
        return redirect()->route('noticias.index');
        
    }
}
