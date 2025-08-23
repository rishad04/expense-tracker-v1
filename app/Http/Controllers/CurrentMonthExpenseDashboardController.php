<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class CurrentMonthExpenseDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $currentMonth = now()->format('Y-m');

        // For initial
        $allCategories = Category::pluck('slug', 'slug')->map(function () {
            return 0.0;
        });

        $usersCurrentMonthExpenses = Expense::selectRaw('categories.slug as category_slug, SUM(amount) as total')
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->where('expenses.user_id', $user->id)
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$currentMonth])
            ->groupBy('categories.slug')
            ->pluck('total', 'category_slug');

        // change values if found
        $monthlyTotals = $allCategories->merge($usersCurrentMonthExpenses);

        $grandTotal = $monthlyTotals->sum();
        $monthlyTotals->put('total', $grandTotal);

        // Get the latest expenses for the table
        $data = Expense::where('user_id', $user->id)->where('date', today())->latest()->limit(4)->get();

        // dd($monthlyTotals);

        // Pass the complete chart data to the view
        return view('dashboard', compact('monthlyTotals', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
