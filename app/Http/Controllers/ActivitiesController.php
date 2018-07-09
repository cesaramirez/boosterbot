<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;

class ActivitiesController extends Controller
{
    /**
     * Undocumented variable.
     *
     * @var [type]
     */
    protected $activities;

    /**
     * Undocumented function.
     *
     * @param Activity $activity
     */
    public function __construct(Activity $activities)
    {
        $this->activities = $activities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = $this->activities->get();

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ActivityRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $this->activities->fill($request->all());

        $this->activities->active = $request->get('active', false);

        if ($this->activities->save()) {
            return redirect(route('activities.index'))
                    ->with('success', '¡La actividad ha sido Guardada con exito!');
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activities.form', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ActivityRequest $request
     * @param \App\Activity                      $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $activity->fill($request->all());

        $activity->active = $request->get('active', false);

        if ($activity->save()) {
            return redirect(route('activities.index'))
                ->with('success', '¡La actividad ha sido Actualizada con exito!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Activity $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect(route('activities.index'))
                    ->with('success', '¡La actividad ha sido eliminada con exito del sistema!');
    }
}
