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
        // Create test users
        // 2 Administrador
        // 200 Cliente
        // 12 Manager
        // 40 VIP + Cliente

        // Create Administrador Users
        $admin_role = \App\Models\Role::factory()->create([
            "name" => "Administrador",
        ]);

        $admin_users = \App\Models\User::factory(2)->create();

        foreach ($admin_users as $user) {
            $user->roles()->attach($admin_role);
        }

        // Create Cliente Users
        $client_role = \App\Models\Role::factory()->create([
            "name" => "Cliente",
        ]);

        $client_users = \App\Models\User::factory(200)->create();

        foreach ($client_users as $user) {
            $user->roles()->attach($client_role);
        }

        // Create Manager Users
        $manager_role = \App\Models\Role::factory()->create([
            "name" => "Manager",
        ]);

        $manager_users = \App\Models\User::factory(12)->create();

        foreach ($manager_users as $user) {
            $user->roles()->attach($manager_role);
        }

        // Create VIP Users
        $vip_role = \App\Models\Role::factory()->create([
            "name" => "VIP",
        ]);

        $vip_users = \App\Models\User::factory(40)->create();

        foreach ($vip_users as $user) {
            $user->roles()->attach($vip_role);
            $user->roles()->attach($client_role);
        }

        // Products and Orders

        $categories = \App\Models\Category::factory(20)->create();

        foreach ($categories as $category) {
            \App\Models\Product::factory(random_int(1,5))->create([
                "category_id" => $category->id,
            ]);
        }

        $tags = \App\Models\Tag::factory(40)->create();

        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            $product_tags = \App\Models\Tag::inRandomOrder()->limit(random_int(1,5))->get();
            foreach ($product_tags as $product_tag) {
                $product->tags()->attach($product_tag);
            }
        }

        $clients = \App\Models\Role::where('name', 'Cliente')->get()->first()->users;

        foreach ($clients as $client) {
            $order_amount = random_int(0, 4);       // Number of orders that we will assign to the user
            for ($i = 0; $i < $order_amount; $i++) {
                $order = \App\Models\Order::factory()->create([
                    "user_id" => $client->id,
                    "status" => "processing"
                ]);
                $products = \App\Models\Product::inRandomOrder()->limit(random_int(1,10))->get();
                foreach ($products as $product) {
                    $units = random_int(1, 5);
                    $order->products()->attach($product, ["units" => $units]);
                    $order->total_price += $product->price * $units;
                }
                $order->save();
            }
        }
    }
}
