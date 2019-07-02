<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CommentModel extends Model
{
	protected $table='comments';
    public function reply(){
    	return $this->hasMany('App\Model\ReplyModel');
    }
    public function posts(){
    	//tao moi quan he one to many voi brands
    	return $this->belongsTo('App\Model\PostModel');
    }
    public function insertComment($data)
    {
    	if(DB::table('comments')->insert($data))
    	{
    		return true;
    	}
    	return false;
    }
}
