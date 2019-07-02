<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PostModel extends Model
{
    protected $table='posts';
    public function categories()
    {
    	return $this->belongsTo('App\Model\CategorieModel');
    }
    public function comments(){
        return $this->hasMany('App\Model\CommentModel');
    }
    public function getAllDataPost()
    {
    	$data=[];
    	$data=PostModel::select('posts.*','categories.name_cat')
        ->join('categories','categories.id','=','posts.id_cat')
        // ->where('posts.title','LIKE','%'.$keyword.'%')
        // ->orwhere('posts.summary','LIKE','%'.$keyword.'%')
        ->paginate(2);
    	// if($data){
    	// 	$data=$data->toArray();
    	// }
    	return $data;
    }
    public function getInfoPostById($id){
        $data=[];
        $data=PostModel::find($id);
        if($data)
        {
            $data=$data->toArray();
        }
        return $data;
    }
    public function insertPost($data)
    {
        if(DB::table('posts')->insert($data)){
            return true;
        }
        return false;
    }
    public function updatePostById($data,$id)
    {
        $up=DB::table('posts')
            ->where('id',$id)
            ->update($data);
        return $up;
    }
    /*front end*/
    public function getDataActive()
    {
        $data=PostModel::all();
        if($data)
        {
            $data=$data->toArray();
        }
        return $data;
    }
    public function getPostNewest()
    {
        $data=[];
        $data=DB::table('posts')->orderBy('created_at','desc')->limit(5)->get();
        if($data)
        {
            $data=$data->toArray();
        }
        return $data;
    }
    public function getPostByCategorie($id)
    {
        $data=[];
        $data=PostModel::select('posts.*','categories.name_cat')->join('categories','categories.id','=','posts.id_cat')->where('posts.id_cat','=',$id)->get();
        if($data)
        {
            $data=$data->toArray();
        }
        return $data;
    }
    public function countPost($id)
    {
        $count=DB::table('posts')->where('id_cat','=',$id)->count();
        return $count;
    }
    public function getPostSameCat($id){
        $data=[];
        $data=DB::table('posts')->where('posts.id_cat','=',$id)->limit(4)->get();
        if($data)
        {
            $data=$data->toArray();
        }
        return $data;
    }
}
