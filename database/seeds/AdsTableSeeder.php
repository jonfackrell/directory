<?php

use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vr = \App\Category::where('name', 'Virtual Reference')->first();

        $vrAd = new \App\Ad([
            'name' => 'Virtual References Best Practices',
            'content' => '<a target="_blank"  href="https://www.amazon.com/gp/product/0838909752/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=0838909752&linkCode=as2&tag=libraryappcenter-20&linkId=f9a1642f8c3dbab688da6341c3ff0e1e"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=US&ASIN=0838909752&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=libraryappcenter-20" ></a><img src="//ir-na.amazon-adsystem.com/e/ir?t=libraryappcenter-20&l=am2&o=1&a=0838909752" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />',
            'starts_at' => \Carbon\Carbon::now(),
            'ends_at' => \Carbon\Carbon::now(),
        ]);

        $vr->ads()->attach($vrAd);
    }
}
