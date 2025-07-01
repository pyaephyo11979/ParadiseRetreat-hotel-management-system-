<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Table;
use App\Models\Course;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles=[
            ['id' => 1, 'name' => 'user'],
            ['id' => 2, 'name' => 'admin'],
            ['id' => 4, 'name' => 'superadmin'],
            ['id' => 5, 'name' => 'employee'],
            ['id' => 6, 'name' => 'chef'],
            ['id' => 8, 'name' => 'waiter']
        ];
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // foreach ($roles as $role) {
        //     Role::insert([
        //         'name' => $role['name'],
        //     ]);
        // }
        Room::factory(30)->create();


    }
}
