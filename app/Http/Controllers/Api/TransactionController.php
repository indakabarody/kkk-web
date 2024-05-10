<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return new TransactionCollection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'type' => 'required|in:Income,Outcome',
            'category' => 'required|in:Iuran,Denda,Lainnya',
            'amount_idr' => 'required|integer',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Transaction::create($request->all());

        return response()->json([
            'message' => 'Transaction created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'type' => 'required|in:Income,Outcome',
            'category' => 'required|in:Iuran,Denda,Lainnya',
            'amount_idr' => 'required|integer',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $transaction->update($request->all());

        return response()->json([
            'message' => 'Transaction updated successfully',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction deleted successfully',
        ], 200);
    }
}
