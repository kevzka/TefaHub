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
    public function index(Request $request)
    {
        // $users = User::all();
        $query = User::query();
        // 2. Logika Search (Nama User atau Nama Barang)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_peminjam', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('jurusan', 'like', '%' . $search . '%');
        }

        // 4. Eksekusi get() SEKALI SAJA di paling bawah bersama pengurutan terbaru
        $users = $query->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $emailes = ['available', 'not available', 'damaged'];
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => $request->input('name', $request->input('nama_peminjam')),
            'class' => $request->input('class', $request->input('kelas')),
        ]);

        $request->validate([
            "name" => "required",
            "class" => "required",
            "jurusan" => "required",
            "no_hp" => "required",
            "role" => "required|in:admin,user",
            "email" => "required|email|unique:peminjam,email"   
        ]);
        User::create([
            "name" => $request['name'],
            "class" => $request['class'],
            "jurusan" => $request['jurusan'],
            "no_hp" => $request['no_hp'],
            "role" => $request['role'],
            "email" => $request['email'],
            "password" =>  Hash::make('password123')
        ]);
        return redirect()->route('admin.users.index')->with('success', 'user added successfully');
    }

    /** 
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $request->merge([
            'name' => $request->input('name', $request->input('nama_peminjam')),
            'class' => $request->input('class', $request->input('kelas')),
        ]);

        //         "name" => "Laptop ASUS ROG Core i7"
        //   "class" => "10"
        //   "email" => "available"
        $request->validate([
            "name" => "required",
            "class" => "required",
            "jurusan" => "required",
            "no_hp" => "required",
            "role" => "required|in:admin,user",
            "email" => "required|email"   
        ]);
        $user->update([
            "name" => $request['name'],
            "class" => $request['class'],
            "jurusan" => $request['jurusan'],
            "no_hp" => $request['no_hp'],
            "role" => $request['role'],
            "email" => $request['email'],
            "password" =>  Hash::make('password123')
        ]);
        return redirect()->route('admin.users.index')->with('success', 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'user deleted successfully');
    }
}
