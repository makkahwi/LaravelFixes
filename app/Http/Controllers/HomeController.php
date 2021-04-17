<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateUser(request $request)
    {
        $user = User::where('email', $request['email']);

        $user->update(['name' => $request['name']]);

        return redirect(route('home'));
    }

    public function deleteUser(request $request)
    {
        $user = User::where('email', $request['email']);

        $user->delete();

        return redirect(route('home'));
    }
}
