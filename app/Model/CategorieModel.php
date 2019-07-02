<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CategorieModel extends Model
{
    protected $table='categories';
    public function posts(){
    	return $this->hasMany('App\Model\PostModel');
    }
    public function getAllDataCat(){
    	$data=[];
    	$data=CategorieModel::all();
    	if($data)
    	{
    		$data=$data->toArray();
    	}
    	return $data;
    }
   public function getDataCatById($id)
   {
        $data=[];
        $data=CategorieModel::find($id);
        if($data){
            $data=$data->toArray();
        }
        return $data;
   }
   public function insertCat($data)
   {
    if(DB::table('categories')->insert($data)){
        return true;
    }
    return false;
   }
   public function duplicateCat($name_cat)
   {
      
        $data=DB::table('categories')->select('*')->where('name_cat','=',$name_cat)->count();
        return $data;

   }
    
}
