<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Article;

use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role->role == 'admin') {
            $users = User::all();
        }
        else {
            $users = null;
        }

        $articles = Article::all();

        return view('home', compact('users', 'articles'));
    }

    /**
     * Change user's role
     *
     * @return void
     */
    public function changeAdminAccess($user_id, Request $request) 
    {
        $user = User::find($user_id);
        if ($request->input('is_admin')) {
            $user->role_id = 1;
            $user->save();
        }
        else {
            $user->role_id = 2;
            $user->save();
        }

        return redirect('home')->with(['message' => 'Права пользователя успешно обновлены']);
    }
}
