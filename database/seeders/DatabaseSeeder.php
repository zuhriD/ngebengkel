<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role], ['created_at' => now(), 'updated_at' => now()]);
        }
    }
}
