<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SlideModel extends Model
{
    protected $table="slides";
    public function getAllDataSlide()
    {
    	$data=[];
    	$data=SlideModel::select('*')->paginate(5);
    	
    	return $data;
    }
    public function getDataSlideActive()
    {
        $data=[];
       // $data=SlideModel::select('*')->where('status','=','1');
        $data=SlideModel::all();
        if($data)
        {
            $data=$data->toArray();
        }
        return $data;
    }
    public function insertData($data)
    {
    	if(DB::table('slides')->insert($data))
    	{
    		return true;
    	}
    	return false;
        
    }
}
