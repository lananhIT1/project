<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CategorieModel;
use App\Model\PostModel;
use App\Model\CommentModel;
use App\Model\ReplyModel;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function infoPost(Request $request,PostModel $post, CategorieModel $cat,ReplyModel $rep)
    {
    	$id=(is_numeric($request->id))?$request->id:0;
    	$data=[];
    	$comment=CommentModel::select('*')->where('id_post','=',$id)->get();
    	$data['comment']=($comment)?$comment->toArray():[];
    	$data['reply']=(ReplyModel::all())->toArray();
    	$data['cat']=$cat->getAllDataCat();

    	$data['infoPost']=$post->getInfoPostById($id);
    	//dd($data);
            //xử ly image product
            $data['infoPost']['image_small']=json_decode($data['infoPost']['image_small'],true);
            $data['infoPost']['image_big']=json_decode( $data['infoPost']['image_big'],true);
        foreach($data['cat'] as $key=>$item)
        {
        	// $item['id']['countPost'][]=$post->countPost($item['id']);
        	if($data['infoPost']['id_cat']==$item['id'])
        	{
        		$data['infoPost']['name_cat']=$item['name_cat'];
        	}
        }
         foreach($data['comment'] as $k=>$val){
         	foreach($data['reply'] as $k2=>$val2){
         		if($val2['id_com']==$val['id']){
         			$data['comment'][$k]['infoRep']=$rep->getRepofCommentById($val['id']);
        		}
        	}
        }
         //dd($data);
    	return view('frontend.post.viewPost',$data);

    }
    public function addComment(Request $request){
    	$id_post=$request->id_post;
    	$comment=$request->comment;
    	if($request->session()->has('user')){
    		$name=$request->session()->get('user');
    	}else{
    		$name=$request->comment_sender_name;
    	}
    	$dataInsert=[
    		'comment_sender_name'=>$name,
    		'comment'=>$comment,
    		'id_post'=>$id_post,
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>null
    	];
    	$comment=new CommentModel;
    	$up=$comment->insertComment($dataInsert);
    	
    	if($up){
    		return redirect()->route('fr.single',['id'=>$id_post]);
    	}
    	else{
    		return redirect()->route('fr.single',['id'=>$id_post],'fail');
    	}

    }
    public function repComment(Request $request)
    {
    	$id_post=$request->id_post;
    	$id_comment=$request->id_com;
    	$comment=$request->comment;
    	if($request->session()->has('user')){
    		$name=$request->session()->get('user');
    	}else{
    		$name=$request->comment_sender_name;
    	}
    	$dataInsert=[
    		'comment_sender_name'=>$name,
    		'comment'=>$comment,
    		'id_com'=>$id_comment,
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>null
    	];
    	$rep=new ReplyModel;
    	$up=$rep->insertRepCom($dataInsert);
    	
    	if($up){
    		return redirect()->route('fr.single',['id'=>$id_post]);
    	}
    	else{
    		return redirect()->route('fr.single',['id'=>$id_post],'fail');
    	}
    }
}
