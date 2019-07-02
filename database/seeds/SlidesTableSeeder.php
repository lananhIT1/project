<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
        	'title'=>'abcd',
        	'image_slide'=>'slide1.png',
        	'description'=>'abc',
        	'status'=>1,
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>null
        ]);
    }
}
