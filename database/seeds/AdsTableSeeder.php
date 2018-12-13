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

        $vrAd1 = \App\Ad::create([
            'name' => 'Virtual References Best Practices',
            'content' => '<a target="_blank"  href="https://www.amazon.com/gp/product/0838909752/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=0838909752&linkCode=as2&tag=libraryappcenter-20&linkId=f9a1642f8c3dbab688da6341c3ff0e1e"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=US&ASIN=0838909752&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=libraryappcenter-20" ></a><img src="//ir-na.amazon-adsystem.com/e/ir?t=libraryappcenter-20&l=am2&o=1&a=0838909752" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />',
            'starts_at' => \Carbon\Carbon::now(),
            'ends_at' => \Carbon\Carbon::now(),
        ]);

        $vrAd2 = \App\Ad::create([
            'name' => 'Selecting and Implementing an Integrated Library System: The Most Important Decision You Will Ever Make',
            'content' => '<a href="https://www.amazon.com/Selecting-Implementing-Integrated-Library-System/dp/0081001533/ref=as_li_ss_il?ie=UTF8&qid=1544677686&sr=8-2&keywords=library+systems&linkCode=li3&tag=libraryappcenter-20&linkId=c127439746e5bfc3f94aa2aacfa4fe5b" target="_blank"><img border="0" src="//ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=0081001533&Format=_SL250_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=libraryappcenter-20" ></a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=libraryappcenter-20&l=li3&o=1&a=0081001533" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />',
            'starts_at' => \Carbon\Carbon::now(),
            'ends_at' => \Carbon\Carbon::now(),
        ]);

        $vr->ads()->attach($vrAd1);
        $vr->ads()->attach($vrAd2);
    }
}
