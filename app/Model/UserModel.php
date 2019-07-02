<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserModel extends Model
{
    protected $table='users';
    public function checkLogin($user,$pass)
    {
    	$data=[];
    	$query=UserModel::select('*')
			->where('username',$user)
			->where('password',$pass)
			->where('status',1)
			->first();
		if($query)
		{
			$data=$query->toArray();
		}
		return $data;
	}
	public function getAllDataUser(){
		$data=[];
		$data=UserModel::select('*')->paginate(5);
		return $data;
	}
	public function insertData($data){
		if(DB::table('users')->insert($data)){
			return true;
		}
		return false;
	}
	public function deleteUserById($id)
	{
		$del=DB::table('users')->where('id','=',$id)->delete();
		if($del)
		{
			return true;
		}
		return false;
	}
	public function getUserById($id)
	{
		$data=[];
		$data=UserModel::find($id);
		if($data)
		{
			$data=$data->toArray();
		}
		return $data;
	}
	public function updateUser($data,$id)
	{
		$up=DB::table('users')
            ->where('id','=',$id)
            ->update($data);
        return $up;
	}
}
