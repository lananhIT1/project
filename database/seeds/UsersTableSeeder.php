<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('users')->insert([
            'username' => 'Hoa',
            'password' => '1234',
            'email' => 'hoatruong@gmail.com',
            'role'=>0,
            'status'=>1,
            'avatar'=>'hoa.png',
            'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>null

        ]);
    }
}
