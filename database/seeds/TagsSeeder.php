<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Tag::class)->create([
            'name_ar' => 'خالي من البيض',
            'name_en' => 'Egg free'
        ]);
        factory(\App\Tag::class)->create([
            'name_ar' => 'خالي من المكسرات',
            'name_en' => 'Nut free'
        ]);
        factory(\App\Tag::class)->create([
            'name_ar' => 'خالي من اللبن',
            'name_en' => 'Milk free'
        ]);
    }
}
