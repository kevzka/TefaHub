<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('user.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $statuses = ['available', 'not available', 'damaged'];
    //     return view("admin.items.create", compact('statuses'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         "name" => "required",
    //         "amount" => "required|integer|min:1",
    //         "status" => "required|in:available,not available,damaged",
    //         "image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
    //     ]);

    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('items', 'public');
    //     }

    //     Item::create([
    //         "name" => $request['name'],
    //         "amount" => $request['amount'],
    //         "status" => $request['status'],
    //         "image" => $imagePath,
    //     ]);
    //     return redirect()->route('user.items.index')->with('success', 'item added successfully');
    // }

    /** 
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('user.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Item $item)
    // {
    //     $statuses = ['available', 'not available', 'damaged'];
    //     return view('user.items.edit', compact('item', 'statuses'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Item $item)
    // {
    //     //         "name" => "Laptop ASUS ROG Core i7"
    //     //   "amount" => "10"
    //     //   "status" => "available"
    //     $request->validate([
    //         "name" => "required",
    //         "amount" => "required|integer|min:1",
    //         "status" => "required|in:available,not available,damaged",
    //         "image" => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
    //     ]);

    //     $imagePath = $item->image;
    //     if ($request->hasFile('image')) {
    //         if ($item->image) {
    //             Storage::disk('public')->delete($item->image);
    //         }
    //         $imagePath = $request->file('image')->store('items', 'public');
    //     }

    //     $item->update([
    //         "name" => $request['name'],
    //         "amount" => $request['amount'],
    //         "status" => $request['status'],
    //         "image" => $imagePath,
    //     ]);
    //     return redirect()->route('user.items.index')->with('success', 'item updated successfully');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Item $item)
    // {
    //     if ($item->image) {
    //         Storage::disk('public')->delete($item->image);
    //     }
    //     $item->delete();
    //     return redirect()->route('user.items.index')->with('success', 'item deleted successfully');
    // }
}
