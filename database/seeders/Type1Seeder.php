<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Type1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coop_type1s')->insert([
            'coop_L1ID' => 1000,
            'coop_L1Text' => 'Government',
        ]);
    }
}
