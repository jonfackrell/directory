<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalog = \App\Category::create([
            'name' => 'Catalog',
        ]);
        $discovery = \App\Category::create([
            'name' => 'Discovery',
        ]);
        $vr = \App\Category::create([
            'name' => 'Virtual Reference',
        ]);
        $erm = \App\Category::create([
            'name' => 'Electronic Resource Management',
        ]);
        $linkResolver = \App\Category::create([
            'name' => 'Link Resolver',
        ]);
    }
}
