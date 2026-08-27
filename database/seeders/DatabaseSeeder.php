<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
        'name' =>'Admin',
        'email' =>'Admin@library.com',
        'password' => Hash::make('1234'),
        'role' =>'admin',
       ]);

       User::factory()->create([
        'name' =>'Librarian One',
        'email' =>'Librarian1@library.com',
        'password' => Hash::make('1234'),
        'role' =>'librarian',
       ]);

       User::factory()->create([
        'name' =>'Librarian two',
        'email' =>'Librarian2@library.com',
        'password' => Hash::make('1234'),
        'role' =>'librarian',
       ]);

       User::factory()->create([
            'name' => 'Member',
            'email' => 'member@library.com',
            'password' => Hash::make('1234'),
            'role' => 'member',
        ]);

       User::factory()->count(16)->create([
        'role'=>'member',
       ]);

       Author::factory()->count(10)->create();

       Category::factory()->count(6)->create();

       Book::factory()->count(50)->create();

       loan::factory()->count(100)->create();

       Review::factory()->count(150)->create();

    }

}
