<?php

use Illuminate\Database\Seeder;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Season::class)->create([
            'name_ar' => 'الاسبوع الماضي',
            'name_en' => 'Last Week'
        ]);
        factory(\App\Season::class)->create([
            'name_ar' => 'هذا الاسبوع',
            'name_en' => 'This Week'
        ]);
        factory(\App\Season::class)->create([
            'name_ar' => 'الاسبوع القادم',
            'name_en' => 'Next Week'
        ]);
        factory(\App\Season::class)->create([
            'name_ar' => 'الخريف',
            'name_en' => 'Fall'
        ]);
    }
}
