<?php

use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Dish::class)->create([
            'name_ar' => 'الأفريقي',
            'name_en' => 'African'
        ]);
        factory(\App\Dish::class)->create([
            'name_ar' => 'أمريكي',
            'name_en' => 'American'
        ]);
        factory(\App\Dish::class)->create([
            'name_ar' => 'آسيا',
            'name_en' => 'Asian'
        ]);
        factory(\App\Dish::class)->create([
            'name_ar' => 'بريطاني',
            'name_en' => 'British'
        ]);
    }
}
