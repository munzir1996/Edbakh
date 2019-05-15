<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\City::class)->create([
            'name_ar' => 'جدة',
            'name_en' => 'Jeddah'
        ]);
        factory(\App\City::class)->create([
            'name_ar' => 'رياض',
            'name_en' => 'Riyad'
        ]);
        factory(\App\City::class)->create([
            'name_ar' => 'دمام',
            'name_en' => 'Damam'
        ]);
    }
}
