<?php

use App\Offering;
use Illuminate\Database\Seeder;

class OfferingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offering::truncate();

        factory(Offering::class, 10)->create();
    }
}
