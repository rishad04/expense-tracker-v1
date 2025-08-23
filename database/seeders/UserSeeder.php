<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {



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

        $expense2 = new Expense();
        $expense2->title = "Traveling";
        $expense2->amount = 600.00;
        $expense2->date = today();
        $expense2->user_id = $user->id;
        $expense2->category_id = Category::where('slug', 'transport')->value('id');
        $expense2->save();

        $expense3 = new Expense();
        $expense3->title = "Cloths";
        $expense3->amount = 300.00;
        $expense3->date = today();
        $expense3->user_id = $user->id;
        $expense3->category_id = Category::where('slug', 'shopping')->value('id');
        $expense3->save();

        $expense4 = new Expense();
        $expense4->title = "Dress";
        $expense4->amount = 800.00;
        $expense4->date = today();
        $expense4->user_id = $user->id;
        $expense4->category_id = Category::where('slug', 'shopping')->value('id');
        $expense4->save();

        $expense5 = new Expense();
        $expense5->title = "Rent";
        $expense5->amount = 500.00;
        $expense5->date = today();
        $expense5->user_id = $user->id;
        $expense5->category_id = Category::where('slug', 'other')->value('id');
        $expense5->save();

        $expense6 = new Expense();
        $expense6->title = "Bills";
        $expense6->amount = 500.00;
        $expense6->date = today();
        $expense6->user_id = $user->id;
        $expense6->category_id = Category::where('slug', 'other')->value('id');
        $expense6->save();
    }
}
