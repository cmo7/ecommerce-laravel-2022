<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(30)->create();

        $admin_role = \App\Models\Role::factory()->create([
            "name" => "Administrador",
        ]);

        $client_role = \App\Models\Role::factory()->create([
            "name" => "Cliente",
        ]);

        $manager_role = \App\Models\Role::factory()->create([
            "name" => "Manager",
        ]);

        $vip_role = \App\Models\Role::factory()->create([
            "name" => "VIP",
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
