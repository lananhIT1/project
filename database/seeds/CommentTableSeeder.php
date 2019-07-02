<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
        	'comment_sender_name'=>'Lan Anh 2 ',
        	'comment'=>'Có thể xin giá không vậy? ',
        	'id_post'=>2,
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>null
        ]);
    }
}
