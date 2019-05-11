<?php

use Illuminate\Database\Seeder;

class PutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Put::class)->create([
            'name_ar' => ' قشارة',
            'name_en' => 'Peeler'
        ]);
        factory(\App\Put::class)->create([
            'name_ar' => 'مقلاة صغيرة',
            'name_en' => 'Small Pan'
        ]);
        factory(\App\Put::class)->create([
            'name_ar' => 'مقلاة كبيرة',
            'name_en' => 'Large Pan'
        ]);
        factory(\App\Put::class)->create([
            'name_ar' => ' وعاء صغير',
            'name_en' => 'Small pot'
        ]);
    }
}
