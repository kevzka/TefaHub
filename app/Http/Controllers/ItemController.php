<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = ['available', 'not available', 'damaged'];
        return view("items.create", compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "amount" => "required|numeric",
            "status" => "required|in:available,not available,damaged"
        ]);
        Item::create([
            "name" => $request['name'],
            "amount" => $request['amount'],
            "status" => $request['status'],
        ]);
        return redirect()->route('items.index')->with('success', 'item added successfully');
    }

    /** 
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $statuses = ['available', 'not available', 'damaged'];
        return view('items.edit', compact('item', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //         "name" => "Laptop ASUS ROG Core i7"
        //   "amount" => "10"
        //   "status" => "available"
        $request->validate([
            "name" => "required",
            "amount" => "required|numeric",
            "status" => "required|in:available,not available,damaged"
        ]);
        $item->update([
            "name" => $request['name'],
            "amount" => $request['amount'],
            "status" => $request['status'],
        ]);
        return redirect()->route('items.index')->with('success', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'item deleted successfully');
    }
}
