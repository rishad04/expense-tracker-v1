<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories = Category::latest()->get();

        $data = Expense::query();

        $data = $data->where('user_id', auth()->user()->id);

        $data = $data->latest();

        $data = $data->paginate(10);

        return view('expenses', compact('categories', 'data'));
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
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'amount' => 'required|numeric|min:0',
                'date' => 'required|date',
                'category_id' => 'required|exists:categories,id',
            ]);

            $validated['user_id'] = auth()->user()->id;

            $expense = new Expense();
            $expense->title = $request->title;
            $expense->category_id = $request->category_id;
            $expense->user_id = auth()->user()->id;
            $expense->amount = $request->amount;
            $expense->date = $request->date;
            $expense->save();


            // Loading the category relation for dynamic table row append
            $expense->load('category');

            return response()->json([
                'status' => 'success',
                'message' => 'Expense added successfully!',
                'expense' => $expense
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, please try again later.'
            ], 500);
        }
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
