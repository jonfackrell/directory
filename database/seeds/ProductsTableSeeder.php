<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horizon = new \App\Product([
            'name' => 'Horizon',
            'description' => 'SirsiDynix Horizon™ is a foundational part of the BLUEcloud LSP. With the stability of Horizon and the power of BLUEcloud, you get a new library services platform without the costs of a system migration. Even better, many of the BLUEcloud apps are included in the cost of your Horizon maintenance, so your library can always use the latest tools.',
            'logo_url' => '',
            'url' => 'http://www.sirsidynix.com/products/horizon',
            'library' => 1,
            'open_source' => 1,
        ]);

        $primo = new \App\Product([
            'name' => 'Primo',
            'description' => 'Delivers a wealth of scholarly resources and rich metadata. Provides seamless exploratory discovery through data-driven services. Offers an intuitive user experience.',
            'logo_url' => '',
            'url' => 'https://www.proquest.com/libraries/academic/discovery-services/Ex-Libris-Primo.html',
            'library' => 1,
            'open_source' => 1,
        ]);

        $eds = new \App\Product([
            'name' => 'EBSCO Discovery Service',
            'description' => 'EBSCO Discovery ServiceTM brings together the most comprehensive collection of content—including superior indexing from top subject indexes, high-end full text and the entire library collection—all within an unparalleled full-featured, customizable discovery layer experience.',
            'logo_url' => '',
            'url' => 'https://www.ebscohost.com/discovery',
            'library' => 1,
            'open_source' => 1,
        ]);

        $sirsidynix = \App\Company::where('name', 'SirsiDynix')->first();
        $sirsidynix->products()->save($horizon);
        $ebsco = \App\Company::where('name', 'EBSCO')->first();
        $ebsco->products()->save($eds);
        $proquest = \App\Company::where('name', 'ProQuest')->first();
        $proquest->products()->save($primo);


        $catalog = \App\Category::where('name', 'Catalog')->first();
        $horizon->categories()->attach($catalog);

        $discovery = \App\Category::where('name', 'Discovery')->first();
        $eds->categories()->attach($discovery);
        $primo->categories()->attach($discovery);

        $products = \App\Product::all();
        $products->searchable();
    }
}
