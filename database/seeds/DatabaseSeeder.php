<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        DB::table('users')->insert([
           'name' => 'Alnejome Mubark',
           'email' => 'admin@admin.com',
           'role' => 1,
           'password' => Hash::make('123'),
        ]);

        DB::table('settings')->insert([
            'title_en' => 'Edbakh',
            'title_ar' => 'إطبخ',
        ]);

        $this->call(ComponentsSeeder::class);
        $this->call(DishesSeeder::class);
        $this->call(SeasonsSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(PutsSeeder::class);
        $this->call(FaqsSeeder::class);

    }
}
