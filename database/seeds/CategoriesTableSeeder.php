<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name_cat'=>'Food',
            'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>null

        ]);
    }
}
