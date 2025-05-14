<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            DB::table('users')->truncate();

            // Create Testing User
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@eatmud9.test',
                'password' => Hash::make('password'),
            ]);

            // Create 10 users
            User::factory(10)->create();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
