<?php

namespace App\Http\Controllers;

use App\Models\RandomFact;
use Illuminate\Http\Request;

class RandomFactsController extends Controller
{
        /**
     * Undocumented variable.
     *
     * @var [type]
     */
    protected $facts;

    /**
     * Undocumented function.
     *
     * @param Reward $facts
     */
    public function __construct(RandomFact $facts)
    {
        $this->facts = $facts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facts = $this->facts->get();

        return view('facts.index', compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->facts->fill($request->all());

        $this->facts->active = $request->get('active', false);

        if ($this->facts->save()) {
            return redirect(route('facts.index'))
                    ->with('success', '¡El Random Fact ha sido Guardado con exito!');
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RandomFact  $randomFact
     * @return \Illuminate\Http\Response
     */
    public function edit(RandomFact $fact)
    {
        return view('facts.form', compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RandomFact  $randomFact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RandomFact $fact)
    {
        $fact->fill($request->all());

        $fact->active = $request->get('active', false);

        if ($fact->save()) {
            return redirect(route('facts.index'))
                ->with('success', '¡El Random Fact ha sido Actualizada con exito!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RandomFact  $randomFact
     * @return \Illuminate\Http\Response
     */
    public function destroy(RandomFact $fact)
    {
        $fact->delete();

        return redirect(route('facts.index'))
                    ->with('success', '¡La recompensa ha sido eliminada con exito del sistema!');
    }
}
