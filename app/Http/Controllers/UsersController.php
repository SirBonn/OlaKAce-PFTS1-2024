<?php

namespace App\Http\Controllers;

use App\Models\Attend;
use App\Models\Category;
use App\Models\People;
use App\Models\Post;
use App\Models\Reason;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_uid', Auth::user()->uid)->get();
        $reasons = Reason::all();
        $attends = Attend::where('user_uid', Auth::user()->uid)->get();
        return view('olakhace', compact('posts', 'reasons', 'attends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'dpi' => 'required|numeric',
            'nickname' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email'
        ]);

        $usuario = null;

        try {

            $usuario = User::create([
                'dpi' => $request['dpi'],
                'nickname' => $request['nickname'],
                'password' => Hash::make($request['password']),
                'email' => $request['email'],
                'rol_uid' => 3
            ]);

        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'User could not be created: ' . $e->getMessage());
        }
        Auth::login($usuario);
        return redirect()->route('publisher');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
