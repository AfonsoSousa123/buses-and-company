<?php

namespace App\Http\Controllers;

use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['index', 'show']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('Users', compact('users'));
    }

    public function destroy(User $user)
    {
        $del = User::findOrFail($user->id);
        $del->delete();

        return back()->withMessage("Utilizador removido com sucesso!");
    }
}
