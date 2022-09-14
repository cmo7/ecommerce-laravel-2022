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

        // Create the roles

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

        // Create users for each role, in kinda logical amounts

        $admin_users = \App\Models\User::factory(2)->create();
        $client_users = \App\Models\User::factory(200)->create();
        $manager_users = \App\Models\User::factory(12)->create();
        $vip_users = \App\Models\User::factory(40)->create();



        // Attach roles to the users

        foreach ($admin_users as $user) {
            $admin_role->users()->attach($user);
        }

        foreach ($client_users as $user) {
            $client_role->users()->attach($user);
        }

        foreach ($manager_users as $user) {
            $manager_role->users()->attach($user);
        }

        foreach ($vip_users as $user) {
            $vip_role->users()->attach($user);
            $client_role->users()->attach($user);
        }


        // Create the Products

        \App\Models\Product::factory(30)->create();

        // Create at least one order for each client

        $clients = \App\Models\Role::where('name', 'Cliente')->get()->first()->users;

        foreach ($clients as $client) {
            $orders = \App\Models\Order::factory(random_int(1,5))->create([
                "user_id" => $client->id,
            ]);

        }

        // Attach products to orders

        $orders = \App\Models\Order::all();

        foreach ($orders as $order) {
            $numberOfProducts = random_int(1, 10);
            for ($i = 0; $i < $numberOfProducts ; $i++) {
                $product = \App\Models\Product::inRandomOrder()->limit(1)->get()->first();
                $order->products()->attach($product, ["units" => random_int(1,5)]);
                $order->total_price += $product->price;
            }
            $order->save();
        }


    }
}
