<?php

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
        factory(Brackets\AdminAuth\Models\AdminUser::class, 10)->create();
        factory(App\Models\Brand::class, 50)->create();
        factory(App\Models\Product::class, 100)->create();
    }
}
