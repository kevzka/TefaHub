<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Inisialisasi query lengkap dengan Eager Loading (with) di awal
        $query = Loan::with(['peminjam', 'barang']);

        // 2. Logika Search (Nama User atau Nama Barang)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('peminjam', function ($u) use ($search) {
                    $u->where('nama_peminjam', 'like', '%' . $search . '%');
                })->orWhereHas('barang', function ($i) use ($search) {
                    $i->where('nama_barang', 'like', '%' . $search . '%');
                });
            });
        }

        // 3. Logika Filter Status
        if ($request->has('status') && $request->status != '') {
            $query->where('status_peminjaman', $request->status);
        }

        // 4. Eksekusi get() SEKALI SAJA di paling bawah bersama pengurutan terbaru
        $loans = $query->latest()->get();

        // 5. Lempar ke View
        return view('admin.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $items = Item::all();
        $statuses = ['dipinjam', 'dikembalikan', 'terlambat'];
        return view("admin.loans.create", compact('statuses', 'users', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "user_id" => "required|exists:peminjam,id",
            "item_id" => "required|exists:barang,id",
            "amount" => "required|integer|min:1",
            "loan_date" => "required|date",
            "return_date" => "required|date",
            "status" => "required|in:dipinjam,dikembalikan",
        ]);
        if (Item::find($request['item_id'])->amount - $request['amount'] < 0) {
            return redirect()->back()->with('success', 'Not enough stock for this item');
        }
        Loan::create([
            'user_id' => $request['user_id'],
            'item_id' => $request['item_id'],
            'amount' => $request['amount'],
            'loan_date' => $request['loan_date'],
            'return_date' => $request['return_date'],
            'status' => $request['status'],
        ]);
        if ($request['status'] == 'dipinjam') {
            Item::find($request['item_id'])->update(['amount' => Item::find($request['item_id'])->amount - $request['amount'], 'status' => Item::find($request['item_id'])->amount - $request['amount'] > 0 ? 'available' : 'not available']);
        }
        return redirect()->route('admin.loans.index')->with('success', 'loan added successfully');
    }

    /** 
     * Display the specified resource.
     */
    public function show(loan $loan)
    {
        return view('admin.loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(loan $loan)
    {
        $users = User::all();
        $items = Item::all();
        $statuses = ['dipinjam', 'dikembalikan', 'terlambat'];
        $loan->load(['user', 'item']);
        return view('admin.loans.edit', compact('loan', 'statuses', 'users', 'items'));
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
            "user_id" => "required|exists:peminjam,id",
            "item_id" => "required|exists:barang,id",
            "amount" => "required|integer|min:1",
            "loan_date" => "required|date",
            "return_date" => "required|date",
            "status" => "required|in:dipinjam,dikembalikan,terlambat",
        ]);
        $loan->update([
            'user_id' => $request['user_id'],
            'item_id' => $request['item_id'],
            'amount' => $request['amount'],
            'loan_date' => $request['loan_date'],
            'return_date' => $request['return_date'],
            'status' => $request['status'],
        ]);
        if ($request['status'] == 'dikembalikan' || $request['status'] == 'terlambat') {
            Item::find($request['item_id'])->update(['amount' => Item::find($request['item_id'])->amount + $request['amount'], 'status' => 'available']);
        }
        return redirect()->route('admin.loans.index')->with('success', 'loan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loan $loan)
    {
        $loan->delete();
        return redirect()->route('admin.loans.index')->with('success', 'loan deleted successfully');
    }
}
