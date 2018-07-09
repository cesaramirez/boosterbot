<?php

namespace App\Http\Controllers;

use App\Http\Requests\RewardRequest;
use App\Models\Reward;

class RewardsController extends Controller
{
    /**
     * Undocumented variable.
     *
     * @var [type]
     */
    protected $rewards;

    /**
     * Undocumented function.
     *
     * @param Reward $rewards
     */
    public function __construct(Reward $rewards)
    {
        $this->rewards = $rewards;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rewards = $this->rewards->get();

        return view('rewards.index', compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rewards.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RewardRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RewardRequest $request)
    {
        $this->rewards->fill($request->all());

        $this->rewards->active = $request->get('active', false);

        if ($this->rewards->save()) {
            return redirect(route('rewards.index'))
                    ->with('success', '¡La recompensa ha sido Guardado con exito!');
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reward $reward
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Reward $reward)
    {
        return view('rewards.form', compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\RewardRequest $request
     * @param \App\Reward                      $reward
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RewardRequest $request, Reward $reward)
    {
        $reward->fill($request->all());

        $reward->active = $request->get('active', false);

        if ($reward->save()) {
            return redirect(route('rewards.index'))
                ->with('success', '¡La recompensa ha sido Actualizada con exito!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reward $reward
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();

        return redirect(route('rewards.index'))
                    ->with('success', '¡La recompensa ha sido eliminada con exito del sistema!');
    }
}
