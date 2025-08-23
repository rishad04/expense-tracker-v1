<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\CreateDemoUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('welcome');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function demoStore(Request $request)
    {

        // dd($request->all());

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            $category = Category::get();

            // Check if the collection of categories is empty
            if ($category->isEmpty()) {
                $category_arr = [
                    [
                        'title' => 'Food',
                        'slug' => 'food',
                        'position' => 1
                    ],
                    [
                        'title' => 'Transport',
                        'slug' => 'transport',
                        'position' => 2
                    ],
                    [
                        'title' => 'Shopping',
                        'slug' => 'shopping',
                        'position' => 3
                    ],
                    [
                        'title' => 'Other',
                        'slug' => 'other',
                        'position' => 199
                    ],
                ];

                foreach ($category_arr as $category) {
                    Category::create($category);
                }
            }

            $user = new User();
            $user->name = 'John Doe';
            $user->email = 'johndoe@gmail.com';
            $user->password = Hash::make('123456');
            $user->save();

            $expense1 = new Expense();
            $expense1->title = "Lunch";
            $expense1->amount = 400.00;
            $expense1->date = today();
            $expense1->user_id = $user->id;
            $expense1->category_id = Category::where('slug', 'food')->value('id');
            $expense1->save();

            $expense1 = new Expense();
            $expense1->title = "Traveling";
            $expense1->amount = 600.00;
            $expense1->date = today();
            $expense1->user_id = $user->id;
            $expense1->category_id = Category::where('slug', 'transport')->value('id');
            $expense1->save();

            $expense1 = new Expense();
            $expense1->title = "Cloths";
            $expense1->amount = 1000.00;
            $expense1->date = today();
            $expense1->user_id = $user->id;
            $expense1->category_id = Category::where('slug', 'shopping')->value('id');
            $expense1->save();

            $expense1 = new Expense();
            $expense1->title = "Dress";
            $expense1->amount = 800.00;
            $expense1->date = today();
            $expense1->user_id = $user->id;
            $expense1->category_id = Category::where('slug', 'shopping')->value('id');
            $expense1->save();

            $expense1 = new Expense();
            $expense1->title = "Rent";
            $expense1->amount = 1000.00;
            $expense1->date = today();
            $expense1->user_id = $user->id;
            $expense1->category_id = Category::where('slug', 'other')->value('id');
            $expense1->save();

            $expense1 = new Expense();
            $expense1->title = "Bills";
            $expense1->amount = 500.00;
            $expense1->date = today();
            $expense1->user_id = $user->id;
            $expense1->category_id = Category::where('slug', 'other')->value('id');
            $expense1->save();
        }

        // dd($user);

        Auth::login($user);

        // $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
