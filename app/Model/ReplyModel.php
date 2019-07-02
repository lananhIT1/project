<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ReplyModel extends Model
{
	protected $table='reply';
    public function comments(){
    	
    	return $this->belongsTo('App\Model\CommentModel');
    }
    public function getRepofCommentById($id){
    	$data=[];
    	$data=ReplyModel::select('*')->where('id_com','=',$id)->get();
    	if($data){
    		$data=$data->toArray();
    	}
    	return $data;
    
    }
    public function insertRepCom($data){
        if(DB::table('reply')->insert($data))
        {
            return true;
        }
        return false;
    }
}
