<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with(['user', 'item'])->get();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $items = Item::all();
        $statuses = ['borrowed','returned'];
        return view("loans.create", compact('statuses', 'users', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "user_id" => "required|exists:users,id",
            "item_id" => "required|exists:items,id",
            "loan_date" => "required|date",
            "return_date" => "required|date",
            "status" => "required|in:borrowed,returned",
        ]);
        Loan::create([
            'user_id' => $request['user_id'],
            'item_id' => $request['item_id'],
            'loan_date' => $request['loan_date'],
            'return_date' => $request['return_date'],
            'status' => $request['status'],
        ]);
        return redirect()->route('loans.index')->with('success', 'loan added successfully');
    }

    /** 
     * Display the specified resource.
     */
    public function show(loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(loan $loan)
    {
        $users = User::all();
        $items = Item::all();
        $statuses = ['borrowed','returned'];
        $loan->with(['user', 'item'])->get();
        return view('loans.edit', compact('loan', 'statuses', 'users', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, loan $loan)
    {
        //         "name" => "Laptop ASUS ROG Core i7"
        //   "class" => "10"
        //   "email" => "available"
        $request->validate([
            "user_id" => "required|exists:users,id",
            "item_id" => "required|exists:items,id",
            "loan_date" => "required|date",
            "return_date" => "required|date",
            "status" => "required|in:borrowed,returned",
        ]);
        $loan->update([
            'user_id' => $request['user_id'],
            'item_id' => $request['item_id'],
            'loan_date' => $request['loan_date'],
            'return_date' => $request['return_date'],
            'status' => $request['status'],
        ]);
        return redirect()->route('loans.index')->with('success', 'loan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'loan deleted successfully');
    }
}
