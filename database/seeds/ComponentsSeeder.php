<?php

use Illuminate\Database\Seeder;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Component::class)->create([
            'name_ar' => 'لحم بقري',
            'name_en' => 'Beef'
        ]);
        factory(\App\Component::class)->create([
            'name_ar' => 'سمك',
            'name_en' => 'Fish'
        ]);
        factory(\App\Component::class)->create([
            'name_ar' => 'عدس',
            'name_en' => 'Lamb'
        ]);

    }
}
