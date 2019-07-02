<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SlideModel;
use App\Model\PostModel;
use App\Model\CategorieModel;
class HomepageController extends Controller
{
    function index(Request $request,SlideModel $slide,PostModel $post){
    	$data=[];
        $cat=new CategorieModel;
        $data['cat']=$cat->getAllDataCat();
    	$data['slide']=$slide->getDataSlideActive();
    	$data['postNew']=$post->getPostNewest();
    	//dd($data['postNew']);
    	foreach($data['postNew'] as $key=>$item){
    		$data['postNew'][$key]->image_small=json_decode($item->image_small,true);
    	}
    	//dd($data['postNew']);
    	//dd($data['slide']);
    	return view('frontend.homepage',$data);
    }
    public function getPostByCategorie(Request $req,PostModel $post,CategorieModel $cat)
    {
        $id=$req->id;  
        $data=[];
        $data['cat']=$cat->getAllDataCat();
        $data['post']=$post->getPostByCategorie($id);
        foreach($data['post'] as $key=>$item){
            $data['post'][$key]['image_small']=json_decode($item['image_small'],true);
            $data['post'][$key]['image_big']=json_decode($item['image_big'],true);
        }
       // dd($data);

        return view('frontend.viewPostByCategorie',$data);
    }
}
