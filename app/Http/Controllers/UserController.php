<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $emailes = ['available', 'not available', 'damaged'];
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "class" => "required",
            "email" => "required"   
        ]);
        User::create([
            "name" => $request['name'],
            "class" => $request['class'],
            "email" => $request['email'],
            "password" =>  Hash::make('password123')
        ]);
        return redirect()->route('users.index')->with('success', 'user added successfully');
    }

    /** 
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //         "name" => "Laptop ASUS ROG Core i7"
        //   "class" => "10"
        //   "email" => "available"
        $request->validate([
            "name" => "required",
            "class" => "required",
            "email" => "required"   
        ]);
        $user->update([
            "name" => $request['name'],
            "class" => $request['class'],
            "email" => $request['email'],
            "password" =>  Hash::make('password123')
        ]);
        return redirect()->route('users.index')->with('success', 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user deleted successfully');
    }
}
