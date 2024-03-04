<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Http\Requests\UpdateVideojuegoRequest;
use App\Models\Desarrolladora;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Videojuego::class, 'videojuego');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $order = $request->query('order', 'titulo');
        $order_dir = $request->query('order_dir', 'asc');

        $videojuegos = Videojuego::with(['desarrolladora'])
                                ->selectRaw('videojuegos.*, desarrolladoras.nombre as desarrolladora, distribuidoras.nombre as distribuidora')
                                ->leftJoin('posesiones', 'posesiones.videojuego_id', '=', 'videojuegos.id')
                                ->leftJoin('desarrolladoras', 'videojuegos.desarrolladora_id', '=', 'desarrolladoras.id')
                                ->leftJoin('distribuidoras', 'desarrolladoras.distribuidora_id', '=', 'distribuidoras.id')
                                ->where('posesiones.user_id', '=', $request->user()->id)
                                ->orderBy($order, $order_dir)
                                ->orderBy('videojuegos.titulo')
                                ->paginate(6);

        return view('videojuegos.index', [
            'videojuegos' => $videojuegos,
            'order' => $order,
            'order_dir' => $order_dir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Videojuego::class)){
            return redirect('login');
        };

        return view('videojuegos.create', [
            'desarrolladoras' => Desarrolladora::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideojuegoRequest $request)
    {
        if ($request->user()->cannot('create', Videojuego::class)){
            return redirect('login');
        };
        $validate = $request->validated();
        Videojuego::create($validate);

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado correctamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', [
            'videojuego' => $videojuego
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
            'desarrolladoras' => Desarrolladora::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideojuegoRequest $request, Videojuego $videojuego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        //
    }
}
