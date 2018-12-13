<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sirsidynix = \App\Company::create([
            'name' => 'SirsiDynix',
            'description' => '',
            'logo_url' => '',
            'url' => 'http://www.sirsidynix.com/',
        ]);

        $ebsco = \App\Company::create([
            'name' => 'EBSCO',
            'description' => '',
            'logo_url' => '',
            'url' => 'https://www.ebsco.com/',
        ]);

        $proquest = \App\Company::create([
            'name' => 'ProQuest',
            'description' => '',
            'logo_url' => '',
            'url' => 'https://www.proquest.com/',
        ]);

        $nubGames = \App\Company::create([
            'name' => 'Nub Games',
            'description' => '',
            'logo_url' => '',
            'url' => 'https://libraryh3lp.com/',
        ]);
    }
}
