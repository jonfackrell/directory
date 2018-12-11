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

        $horizon = \App\Product::where('name', 'Horizon')->first();
        $horizon->categories()->attach($catalog);

        $eds = \App\Product::where('name', 'EBSCO Discovery Service')->first();
        $eds->categories()->attach($discovery);

        $primo = \App\Product::where('name', 'Primo')->first();
        $primo->categories()->attach($discovery);
    }
}
