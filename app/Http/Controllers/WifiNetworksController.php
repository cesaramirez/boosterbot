<?php

namespace App\Http\Controllers;

use App\Http\Requests\WifiNetworkRequest;
use App\Models\WifiNetwork;

class WifiNetworksController extends Controller
{
    /**
     * Undocumented variable.
     *
     * @var [type]
     */
    protected $networks;

    /**
     * Undocumented function.
     *
     * @param WifiNetwork $networks
     */
    public function __construct(WifiNetwork $networks)
    {
        $this->networks = $networks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $networks = $this->networks->get();

        return view('networks.index', compact('networks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('networks.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\WifiNetworkRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(WifiNetworkRequest $request)
    {
        $this->networks->fill($request->all());

        $this->networks->active = $request->get('active', false);

        if ($this->networks->save()) {
            return redirect(route('networks.index'))
                    ->with('success', '¡La Red WiFi ha sido Guardada con exito!');
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WifiNetwork $network
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(WifiNetwork $network)
    {
        return view('networks.form', compact('network'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\WifiNetworkRequest $request
     * @param \App\Models\WifiNetwork               $network
     *
     * @return \Illuminate\Http\Response
     */
    public function update(WifiNetworkRequest $request, WifiNetwork $network)
    {
        $network->fill($request->all());

        $network->active = $request->get('active', false);

        if ($network->save()) {
            return redirect(route('networks.index'))
                ->with('success', '¡La red wifi ha sido Actualizada con exito!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WifiNetwork $network
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(WifiNetwork $network)
    {
        $network->delete();

        return redirect(route('networks.index'))
                    ->with('success', '¡La red wifi ha sido eliminada con exito del sistema!');
    }
}
