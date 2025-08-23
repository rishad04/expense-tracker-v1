<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;

class CurrentMonthExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        $currentMonth = now()->format('Y-m');
        $user = auth()->user();

        $monthlyTotals = Expense::selectRaw('categories.slug as category_slug, SUM(amount) as total')
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->where('expenses.user_id', $user->id)
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$currentMonth])
            ->groupBy('categories.slug')
            ->pluck('total', 'category_slug');

        // dd($monthlyTotals);

        $grandTotal = $monthlyTotals->sum();
        $monthlyTotals->put('total', $grandTotal);

        // dd($monthlyTotals);

        $data = Expense::latest()->limit(4)->get();

        // $data = Expense::latest()->limit(4)->get();
        return view('dashboard', compact('categories', 'monthlyTotals', 'data'));
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
