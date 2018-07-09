<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Undocumented variable.
     *
     * @var [type]
     */
    protected $users;

    /**
     * Undocumented function.
     *
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users
            ->exceptLogged()
            ->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\UserStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->users->fill($request->all());

        $this->users->active = $request->get('active', false);

        $this->users->password = bcrypt($request->password);

        if ($this->users->save()) {
            return redirect(route('users.index'))
                    ->with('success', '¡El Usuario ha sido Guardado con exito!');
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->password = null;

        return view('users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User                     $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->except('password'));

        $user->active = $request->get('active', false);

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($user->save()) {
            return redirect(route('users.index'))
                ->with('success', '¡El Usuario ha sido Actualizado con exito!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'))
                    ->with('success', '¡El Usuario ha sido eliminado con exito del sistema!');
    }
}
