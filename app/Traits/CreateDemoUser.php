<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

trait CreatesDemoUser
{
  /**
   * Creates a demo user and their associated expenses.
   */
  protected function createDemoUser(string $name, string $email, string $password): User
  {
    // Create the user
    $user = new User();
    $user->name = $name;
    $user->email = $email;
    $user->password = Hash::make($password);
    $user->save();

    // Create categories and expenses for the user
    $categories = [
      'Lunch' => ['slug' => 'food', 'amount' => 400.00],
      'Traveling' => ['slug' => 'transport', 'amount' => 600.00],
      'Cloths' => ['slug' => 'shopping', 'amount' => 1000.00],
      'Dress' => ['slug' => 'shopping', 'amount' => 800.00],
      'Rent' => ['slug' => 'other', 'amount' => 1000.00],
      'Bills' => ['slug' => 'other', 'amount' => 500.00],
    ];

    foreach ($categories as $title => $data) {
      $expense = new Expense();
      $expense->title = $title;
      $expense->amount = $data['amount'];
      $expense->date = today();
      $expense->user_id = $user->id;
      $expense->category_id = Category::where('slug', $data['slug'])->value('id');
      $expense->save();
    }

    return $user;
  }
}
