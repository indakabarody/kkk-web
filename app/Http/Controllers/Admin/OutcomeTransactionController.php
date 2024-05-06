<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OutcomeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('type', 'Outcome')->latest()->get();
        return view('admin.pages.outcome-transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.outcome-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount_idr' => 'required|numeric',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:65535',
        ]);

        Transaction::create([
            'type' => 'Outcome',
            'amount_idr' => $request->amount_idr,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.outcome-transactions.index')->with('toast_success', 'Berhasil menambahkan data transaksi.');
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
        $transaction = Transaction::where([
            'id' => $id,
            'type' => 'Outcome',
        ])->firstOrFail();

        return view('admin.pages.outcome-transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::where([
            'id' => $id,
            'type' => 'Outcome',
        ])->firstOrFail();

        $request->validate([
            'amount_idr' => 'required|numeric',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:65535',
        ]);

        $transaction->update([
            'type' => 'Outcome',
            'amount_idr' => $request->amount_idr,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.outcome-transactions.index')->with('toast_success', 'Berhasil mengubah data transaksi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::where([
            'id' => $id,
            'type' => 'Outcome',
        ])->firstOrFail();

        $transaction->delete();

        return back()->with('toast_success', 'Berhasil menghapus data transaksi.');
    }
}
