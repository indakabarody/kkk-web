<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class IncomeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('type', 'Income')->latest()->get();
        return view('admin.pages.income-transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::orderBy('nim', 'ASC')->get();
        return view('admin.pages.income-transactions.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|numeric',
            'category' => 'required|string|in:Iuran,Denda,Lainnya',
            'amount_idr' => 'required|numeric',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:65535',
        ]);

        $student = Student::findOrFail($request->student_id);

        Transaction::create([
            'student_id' => $student->id,
            'type' => 'Income',
            'category' => $request->category,
            'amount_idr' => $request->amount_idr,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.income-transactions.index')->with('toast_success', 'Berhasil menambahkan data transaksi.');
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
            'type' => 'Income',
        ])->firstOrFail();

        $students = Student::orderBy('nim', 'ASC')->get();

        return view('admin.pages.income-transactions.edit', compact('transaction', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::where([
            'id' => $id,
            'type' => 'Income',
        ])->firstOrFail();

        $request->validate([
            'student_id' => 'required|numeric',
            'category' => 'required|string|in:Iuran,Denda,Lainnya',
            'amount_idr' => 'required|numeric',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:65535',
        ]);

        $student = Student::findOrFail($request->student_id);

        $transaction->update([
            'student_id' => $student->id,
            'type' => 'Income',
            'category' => $request->category,
            'amount_idr' => $request->amount_idr,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.income-transactions.index')->with('toast_success', 'Berhasil mengubah data transaksi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::where([
            'id' => $id,
            'type' => 'Income',
        ])->firstOrFail();

        $transaction->delete();

        return back()->with('toast_success', 'Berhasil menghapus data transaksi.');
    }
}
