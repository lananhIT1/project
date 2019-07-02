<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reply')->insert([
        	'comment_sender_name'=>'Lan Anh',
        	'comment'=>'Mình cũng thấy vậy',
        	'id_com'=>2,
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>null
        ]);
    }
}
