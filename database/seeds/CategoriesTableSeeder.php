<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'categories_name' => 'Festival Electronic Dance Music',
                'categories_desc' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'categories_name' => 'Conference',
                'categories_desc' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'categories_name' => 'Exhibition',
                'categories_desc' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'categories_name' => 'Sports',
                'categories_desc' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'categories_name' => 'Workshop',
                'categories_desc' => 'Lorem ipsum dolor sit amet',
            ],
        ]);
    }
}
