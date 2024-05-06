<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentCount = Student::count();
        $incomeTransactionCount = Transaction::where('type', 'Income')->count();
        $outcomeTransactionCount = Transaction::where('type', 'Outcome')->count();
        $incomeChartItems = $this->generateIncomeChartItems();
        $chartMonths = $this->generateChartMonths(6);

        return view('admin.pages.home.index', compact('studentCount', 'incomeTransactionCount', 'outcomeTransactionCount', 'incomeChartItems', 'chartMonths'));
    }

    /**
     * Generate income chart items per month.
     *
     * @return array
     */
    public function generateIncomeChartItems($month = 6)
    {
        $incomeChartItems = [];

        for ($i = $month - 1; $i >= 0; $i--) {
            $transaction = Transaction::where('type', 'Income')
                ->whereMonth('date', Carbon::now()->subMonthNoOverflow($i))
                ->whereYear('date', Carbon::now()->subMonthNoOverflow($i)->format('Y'))
                ->sum('amount_idr');

            array_push($incomeChartItems, $transaction);
        }

        return $incomeChartItems;
    }

    /**
     * Generate chart months.
     *
     * @return array
     */
    public function generateChartMonths($month = 12)
    {
        $chartMonths = [];

        for ($i = $month - 1; $i >= 0; $i--) {
            if ($i > 0) {
                $month = Carbon::now()->subMonthNoOverflow($i)->endOfMonth();
            } else {
                $month = Carbon::now();
            }

            array_push($chartMonths, $month);
        }

        return $chartMonths;
    }
}
